<?php
include_once "controleurs/controleurManufacture.class.php";
if (!isset($_GET['action'])) {
	$action = "";
} else {
	$action = $_GET['action'];
}
$controleur = Manufacture::creerControleur($action);
$nomVue = $controleur->executerAction();
include_once("vues/" . $nomVue . ".php");
