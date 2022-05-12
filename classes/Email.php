<?php

    namespace Classes;

    use PHPMailer\PHPMailer\PHPMailer;

    class Email {

        public $email;
        public $nombre;
        public $apellido;
        public $creado_el;
        public $token;

        public function __construct($nombre, $apellido, $email, $creado_el, $token)
        {
            $this->email = $email;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->creado_el = $creado_el;
            $this->token = $token;
        }

        public function enviarEmail() {
            //Crear el objeto de Email
            $phpmailer = new PHPMailer();
            $phpmailer->Host = 'pop3.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 9950;
            $phpmailer->Username = '1e5d1a1a6c1b3a';
            $phpmailer->Password = '3bcb5f543c4d9b';

            $phpmailer->setFrom('cuentas.it@solutions.com');
            $phpmailer->addAddress('cuentas@itsolutions', 'itsolutions.com');
            $phpmailer->Subject = 'Nuevo usuario Registrado';

            //Set HTML
            $phpmailer->isHTML(TRUE);
            $phpmailer->CharSet = 'UTF-8';

            $contenido = "<html>";
            $contenido .= "<h2 style='text-align: center; font-weight: 600; font-size: 1.8rem;'>Administracion - Registro Usuarios</h2>";
            $contenido .= "<p style='font-weight: 600; font-size: 1.3rem'>Se ha registrado un nuevo usuario</p>";
            $contenido .= "<p>Nombre completo: " . $this->nombre . $this->apellido . "</p>";
            $contenido .= "<p>Email: " . $this->email . "</p>";
            $contenido .= "<p>Para confirmar el usuario da click en el siguiente Enlace: </p><a href='http://localhost:3000/admin/confirm/user?token=" . $this->token . "' style='text-decoration: none; color: #023e8a;'>Confirmar usuario</a>";
            $contenido .= "<p style='font-weight: 600; font-size: 1.5rem; color: #d00000;'>Recuerda que solo el admin puede realizar este movimiento</p>";
            $contenido .= "</html>";

            $phpmailer->Body = $contenido;
            $phpmailer->AltBody = 'Esto es un texto alternativo sin HTML';

            //Enviar el phpmailer
            $phpmailer->send();

        }

    }