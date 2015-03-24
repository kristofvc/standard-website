# Contact component

This is a component that includes a controller to render a contact-form and then throws an event when the contact-form is submitted.
This way listeners can handle the submission and send a mail, set a notice, etc...

## Installing the component with composer

```
    "require": {
        ...
        "kristofvc/contact": "1.0"
    }
```

## How to use the component with Symfony 2

### Add some services

```xml
        <service id="kristofvc_contact.controller.contact" class="Kristofvc\Contact\Controller\Contact">
            <argument type="service" id="templating" />
            <argument type="service" id="form.factory" />
            <argument type="service" id="event_dispatcher" />
            <argument type="service" id="kristofvc_contact.form.type.contact" />
            <argument>:Main:contact.html.twig</argument>
        </service>

        <service id="kristofvc_contact.event.mail_contact_listener" class="Kristofvc\Contact\Event\MailContactListener">
            <argument type="service" id="mailer" />
            <argument>%mailer_from%</argument>
            <argument>%mailer_to%</argument>
            <tag name="kernel.event_listener" event="contact.contact_submitted_event" method="sendMail" />
        </service>

        <service id="kristofvc_contact.event.success_notice_listener" class="Kristofvc\Contact\Event\SuccessNoticeListener" scope="request">
            <argument type="service" id="request" />
            <tag name="kernel.event_listener" event="contact.contact_submitted_event" method="sendSuccessNotice" />
        </service>

        <service id="kristofvc_contact.form.type.contact" class="Kristofvc\Contact\Form\Type\ContactType">
            <argument>true</argument>
        </service>
```

You can add other services in the Event-folder, or your own services the same way.

### Add a route

```yml
    kristofvc_controller_main_contact:
        path: /contact
        defaults: { _controller: kristofvc_contact.controller.contact:__invoke }
        methods: ["GET", "POST"]
```

### Activate the validation the app/confing/AppKernel.php

```php
    public function boot()
    {
        parent::boot();
    
        $validatorBuilder = $this->getContainer()->get('validator.builder');
        $validatorBuilder->addXmlMappings([
            __DIR__.'/../vendor/kristofvc/component/Contact/Resources/config/validators_contact.xml'
        ]);
    }
```

### Add a template under app/Resources/views/Main/contact.html.twig

```twig
    {% extends "::base.html.twig" %}
    
    {% block body %}
        <div class="container">
            <div class="row marketing">
                <div class="col-sm-11 col-sm-offset-1">
                    <h2 class="pull-left marketing-title">Get in touch</h2>
                    <div class="clearfix"></div>
                    {% if app.request.session.flashBag.has('success-notice')|length > 0 %}
                        <p class="pull-left marketing-byline-success marketing-byline">{% for message in app.request.session.flashBag.get('success-notice') %}{{ message }}{% endfor %}</p>
                    {% else %}
                        <p class="pull-left marketing-byline">Fill out the form below!</p>
                    {% endif %}
                </div>
            </div>
            {{ form_start(form) }}
                <div class="col-sm-6">
                    {{ form_row(form.name) }}
                    {{ form_row(form.email) }}
                    {{ form_row(form.recaptcha) }}
                </div>
                <div class="col-sm-6">
                    {{ form_row(form.message) }}
                    <div class="form-group">
                        <button class="btn btn-primary pull-right" type="submit">Send <i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>
            {{ form_end(form) }}
        </div>
    {% endblock body %}
```