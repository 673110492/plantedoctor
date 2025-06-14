@component('mail::message')
# 🔐 Vérification en deux étapes

Bonjour **{{ $user->name }}**,
Une tentative de connexion à votre compte **{{ config('app.name') }}** a été détectée.
Pour sécuriser votre compte, nous avons activé la vérification en deux étapes (2FA).

Veuillez saisir le code suivant pour valider votre identité :

@component('mail::panel')
## ✅ Code de vérification : **{{ $user->two_factor_code }}**
@endcomponent

⚠️ Ce code est valable uniquement pendant **10 minutes**. Passé ce délai, vous devrez demander un nouveau code.

---

### Pourquoi ai-je reçu cet e-mail ?

Cet e-mail vous est envoyé car une tentative de connexion a été effectuée avec votre identifiant.
Si **vous êtes bien à l’origine** de cette tentative, veuillez entrer ce code pour poursuivre la connexion.

Si **vous n’êtes pas à l’origine** de cette demande, il est possible que quelqu’un essaie d'accéder à votre compte.
Dans ce cas, nous vous recommandons de modifier votre mot de passe immédiatement.

@component('mail::button', ['url' => config('app.url')])
Accéder au site
@endcomponent

Merci de votre confiance,
L’équipe **{{ config('app.name') }}**

@component('mail::subcopy')
Si vous avez des questions, n'hésitez pas à nous contacter via le formulaire de contact du site.
@endcomponent
@endcomponent
