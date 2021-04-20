<?php
session_start();
global $member;
global $role;

include_once 'koneksi.php';
include_once 'header.php';
echo '<br/>';
include_once 'menu.php';
echo '<br/>';
include_once 'main.php';
include_once 'sidebar.php';
include_once 'footer.php';