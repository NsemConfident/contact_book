<?php
// src/controllers/ContactController.php

require_once __DIR__ . '/../models/Contact.php';
class ContactController {
    public function index() {
        $contact = new Contact();
        $stmt = $contact->read();
        include __DIR__ . '/../views/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contact = new Contact();
            $contact->name = $_POST['name'];
            $contact->phone = $_POST['phone'];
            $contact->email = $_POST['email'];
            $contact->category = $_POST['category'];

            if ($contact->create()) {
                header('Location: index.php');
            }
        }
        include __DIR__ . '/../views/create.php';
    }

    public function edit($id) {
        $contact = new Contact();
        $contact->id = $id;
        $currentContact = $contact->readOne();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contact->name = $_POST['name'];
            $contact->phone = $_POST['phone'];
            $contact->email = $_POST['email'];
            $contact->category = $_POST['category'];

            if ($contact->update()) {
                header('Location: index.php');
            }
        }

        include __DIR__ . '/../views/edit.php';
    }

    public function delete($id) {
        $contact = new Contact();
        $contact->id = $id;

        if ($contact->delete()) {
            header('Location: index.php');
        }
    }
}
