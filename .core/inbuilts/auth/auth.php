<?php

function set_auth($id = null, $username = null) {
    if ($id && $username) {
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $username;
    }
}

function get_user() {
    if (isset($_SESSION['id']) && isset($_SESSION['name'])) {
        return array($_SESSION['id'], $_SESSION['name']);
    }
}

function user_name() {
    if (isset($_SESSION['name'])) {
        return $_SESSION['name'];
    }
}

function user_id() {
    if (isset($_SESSION['id'])) {
        return $_SESSION['id'];
    }
}

function check_auth() {
    if (isset($_SESSION['id']) && isset($_SESSION['name'])) {
        return true;
    }
    return false;
}

function destroy_user() {
    session_unset();
    session_destroy();
}