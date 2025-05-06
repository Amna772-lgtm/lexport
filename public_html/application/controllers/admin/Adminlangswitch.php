<?php
class Adminlangswitch extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper( 'url' );
	}

	public function switchLanguage( $language = '' ) {
		$language = ! empty( $language ) ? $language : 'arabic';
		$this->session->set_userdata( 'admin_site_lang', $language );
		$referer      = $_SERVER['HTTP_REFERER'] ?? '';
		$referer_host = parse_url( $referer, PHP_URL_HOST );
		$site_host    = parse_url( site_url(), PHP_URL_HOST );
		redirect( ( $referer && $referer_host === $site_host ) ? $referer : site_url() );
	}
}
