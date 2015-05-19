# Add a recaptcha in a Symfony2 project

## Add some packages in composer.yml

```yml
    "require": {
        ...
        "guzzlehttp/guzzle": "~5.2",
        "excelwebzone/recaptcha-bundle": "dev-master",
        ...
    },    
```

## Add some config

```yml
    ewz_recaptcha:
        public_key:   %recaptcha_public%
        private_key:  %recaptcha_secret%
        locale_key:   %kernel.default_locale%
        enabled:      true
```

## Make sure the recaptcha is used in the contact form type

```xml
    <service id="kristofvc_contact.form.type.contact" class="Kristofvc\Component\Contact\Form\Type\ContactType">
        <argument>true</argument>
    </service>
```

## Add some validation in your validation file

```xml
    <property name="recaptcha">
        <constraint name="EWZ\Bundle\RecaptchaBundle\Validator\Constraints\True" />
    </property>
```