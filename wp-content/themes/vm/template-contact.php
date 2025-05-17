<?php get_header(); ?>
<?php include('templates/content/flexible.php') ?>

    <div class="wrapper">
<?php /* Template Name: Template "Contact" */ ?>
<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if(have_posts()): while(have_posts()): the_post(); ?>
    <section class="contact">
        <div class="contact__content">
            <?php the_content(); ?>
        </div>
        <div class="contact__form">
            <?php
            $errors = $_SESSION['dw_contact_form_errors'] ?? [];
            unset($_SESSION['dw_contact_form_errors']);
            $success = $_SESSION['dw_contact_form_success'] ?? false;
            unset($_SESSION['dw_contact_form_success']);
            if($success): ?>
            <p class="contact__success"><?=$success?></p>
            <?php else: ?>
            <form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="POST" class="form">
                <fieldset class="form__fields">
                    <div class="field">
                        <label for="firstname" class="field__label">Prénom</label>
                        <input type="text" name="firstname" id="firstname" class="field__input">
                        <?php if(isset($errors['firstname'])): ?>
                            <p class="field__error"><?= $errors['firstname']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="field">
                        <label for="lastname" class="field__label">Nom</label>
                        <input type="text" name="lastname" id="lastname" class="field__input">
                        <?php if(isset($errors['lastname'])): ?>
                            <p class="field__error"><?= $errors['lastname']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="field">
                        <label for="email" class="field__label">Adresse mail</label>
                        <input type="email" name="email" id="email" class="field__input">
                        <?php if(isset($errors['email'])): ?>
                            <p class="field__error"><?= $errors['email']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="field">
                        <label for="subject" class="field__label">Sujet</label>
                        <input type="text" name="subject" id="subject" class="field__input">
                        <?php if(isset($errors['subject'])): ?>
                            <p class="field__error"><?= $errors['subject']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="field">
                        <label for="message" class="field__label">Message</label>
                        <textarea name="message" id="message" class="field__input"></textarea>
                        <?php if(isset($errors['message'])): ?>
                            <p class="field__error"><?= $errors['message']; ?></p>
                        <?php endif; ?>
                    </div>
                </fieldset>
                <div class="form__submit">
                    <?php
                    // Cet input hidden permet de spécifier à WP (via l'appel d'URL "admin-post.php") que c'est notre fonction de traitement "dw_handle_contact_form_submit" qu'il faut appeler lorsque ces données seront envoyées.
                    ?>
                    <input type="hidden" name="action" value="dw_contact_form_submit">
                    <button type="submit" class="btn">Envoyer</button>
                </div>
            </form>
            <?php endif; ?>
        </div>
        <div class="coord_wrapper">
        <section class="coord">
           <h2>Nos coordonnées</h2>
            <span> Mail : srglevieuxmoulin@levm.be</span>
            <span>Téléphone : 063 / 60.11.50</span>

        </section>
        </div>
    </section>


<?php
    // On ferme "la boucle" (The Loop):
endwhile; else: ?>
    <p>Pas de contenu à afficher.</p>
<?php endif; ?>
    </div>
    </div>
<?php get_footer(); ?>