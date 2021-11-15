<?php
session_start();
include('../model/Atelier.php');
include('../connect/connect.php');

displayAtelier($bdd);