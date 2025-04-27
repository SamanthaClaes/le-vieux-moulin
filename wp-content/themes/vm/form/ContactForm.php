<?php

namespace DW_Theme\Forms;

class ContactForm
{
    protected array $rules = [];
    protected array $sanitizers = [];

    public function __construct()
    {
    }

    public function rule(string $field, string $rule): static
    {
        if(! array_key_exists($field, $this->rules)) {
            $this->rules[$field] = [];
        }

        $this->rules[$field][] = $rule;

        return $this;
    }

    public function sanitize(string $field, string $callback): static
    {
        $this->sanitizers[$field] = $callback;

        return $this;
    }

    public function handle(array $data): void
    {
        // Valider les données envoyées.
        if(is_array($errors = $this->validate($data))) {
            // En cas de problème de validation, renvoyer l'utilisateur sur la page précédente (où se trouvait le formulaire) afin d'y afficher les erreurs de validation.
            $_SESSION['dw_contact_form_errors'] = $errors;
            wp_safe_redirect($_SERVER['HTTP_REFERER']);
            exit;
        }

        // Nettoyer les données (sanitize).
        $data = $this->cleanData($data);

        // Envoyer un mail de notification.
        wp_mail(
            to: 'toon@whitecube.be',
            subject: 'Nouveau message "'.$data['subject'].'"',
            message: $this->generateMailContent($data),
        );

        // Sauvegarder l'envoi de formulaire en base de données.
        wp_insert_post([
            'post_type' => 'contact_message',
            'post_status' => 'publish',
            'post_title' => $data['firstname'].' '.$data['lastname'],
            'post_content' => $this->generateMailContent($data),
        ]);

        // Renvoyer l'utilisateur vers la page précédente (où se trouvait le formulaire) afin d'y afficher un message de succès (feedback).
        $_SESSION['dw_contact_form_success'] = 'Merci '.$data['firstname'].', votre message a bien été envoyé.';
        wp_safe_redirect($_SERVER['HTTP_REFERER']);
        exit;
    }

    protected function validate(array $data): bool|array
    {
        $errors = [];

        foreach ($this->rules as $field => $rules) {
            foreach ($rules as $rule) {
                $method = 'check_'.$rule;
                $error = $this->$method($field, $data[$field] ?? null);
                if(! is_string($error)) continue;
                $errors[$field] = $error;
                break;
            }
        }

        return $errors ?: true;
    }

    protected function check_required(string $field, mixed $value): bool|string
    {
        if($value || $value == 0) {
            return true;
        }

        return 'Ce champ est requis.';
    }

    protected function check_valid_email(string $field, mixed $value): bool|string
    {
        if(filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return 'L\'adresse mail n\'est pas valide.';
    }

    protected function check_no_test(string $field, mixed $value): bool|string
    {
        if(! is_string($value)) {
            return true;
        }

        if(strpos($value, 'test') === false) {
            return true;
        }

        return 'Ce champ ne peut pas contenir le mot "test".';
    }

    protected function cleanData(array $data): array
    {
        $cleaned = [];

        foreach ($this->sanitizers as $field => $callback) {
            $cleaned[$field] = call_user_func($callback, $data[$field] ?? null);
        }

        return $cleaned;
    }

    protected function generateMailContent(array $data): string
    {
        return 'Bonjour,'.PHP_EOL.PHP_EOL
            .'Un nouveau message a été envoyé par le formulaire de contact.'.PHP_EOL.PHP_EOL
            .'Nom: '.$data['lastname'].PHP_EOL
            .'Prénom: '.$data['firstname'].PHP_EOL
            .'E-mail: '.$data['email'].PHP_EOL
            .'Sujet: '.$data['subject'].PHP_EOL
            .'Message:'.PHP_EOL
            .$data['message'];
    }

}