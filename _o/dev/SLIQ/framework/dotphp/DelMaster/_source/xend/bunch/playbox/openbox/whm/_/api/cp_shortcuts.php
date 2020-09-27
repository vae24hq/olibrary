<?php

class cPShortcuts {
	public function listAccounts(){
		return $this->runQuery('listaccts', []);
	}


	public function createAccount($domain_name, $username, $password, $plan){
		return $this->runQuery('createacct', [
		   'username' => $username,
		   'domain' => $domain_name,
		   'password' => $password,
		   'plan' => $plan,
		]);
   }


   public function destroyAccount($username){
   	return $this->runQuery('removeacct', [
	      'username' => $username,
	  ]);
	}

	public function listEmailAccounts($username){
		return $this->cpanel('Email', 'listpops', $username);
	}

	public function addEmailAccount($username, $email, $password){
      list($account, $domain) = $this->split_email($email);
      return $this->emailAction('addpop', $username, $password, $domain, $account);
   }

   public function changeEmailPassword($username, $email, $password){
     list($account, $domain) = $this->split_email($email);
     return $this->emailAction('passwdpop', $username, $password, $domain, $account);
   }


   public function checkConnection(){
		try {
		   $this->runQuery('', []);
		} catch (\Exception $e) {
		   if ($e->hasResponse()) {
		       switch ($e->getResponse()->getStatusCode()) {
		           case 403:
		               return [
		                   'status' => 0,
		                   'error' => 'auth_error',
		                   'verbose' => 'Check Username and Password/Access Key.'
		               ];
		           default:
		               return [
		                   'status' => 0,
		                   'error' => 'unknown',
		                   'verbose' => 'An unknown error has occurred. Server replied with: ' . $e->getResponse()->getStatusCode()
		               ];
		       }
		   } else {
		       return [
		           'status' => 0,
		           'error' => 'conn_error',
		           'verbose' => 'Check CSF or hostname/port.'
		       ];
		   }
		   return false;
		}

		return [
		   'status' => 1,
		   'error' => false,
		   'verbose' => 'Everything is working.'
		];
   }


   private function split_email($email){
		$email_parts = explode('@', $email);
		if (count($email_parts) !== 2) {
		   throw new \Exception("Email account is not valid.");
		}

		return $email_parts;
   }

   private function emailAction($action, $username, $password, $domain, $account){
		return $this->cpanel('Email', $action, $username, [
		   'domain' => $domain,
		   'email' => $account,
		   'password' => $password,
		]);
   }
}
?>