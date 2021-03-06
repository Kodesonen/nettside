<?php

class Kodesonen{
	public $name, $contact, $facebook, $github, $instagram, $twitter, $linkedin;
	protected $sql;

	function __construct(){
		$this->name = "Kodesonen";
		$this->contact = "kontakt@kodesonen.no";
		$this->facebook = "https://facebook.com/kodesonen";
		$this->github = "https://github.com/kodesonen";
		$this->instagram = "https://instagram.com/kodesonen";
		$this->twitter = "https://twitter.com/kodesonen";
		$this->linkedin = "https://www.linkedin.com/company/kodesonen";
		$this->sql = new sqlCommunication;
	}

	public function betaAccess(){
		$whitelist = array();

		if(!in_array($this->GetIP(), $whitelist)){
			echo "<html><head><title>Kodesonen</title></head><body><strong>Kodesonen er under utvikling!</strong><br>
			Følg oss på Facebook og Instagram mens du venter! :)</body></html>";
			die();
	    }
	}

	public function GetIP(){
		return $_SERVER['REMOTE_ADDR'];
	}

	public function getDate($type){
		switch($type){
			case 1: return date('d.m.Y'); break;
			case 2: return date('m/d/Y (H:i)'); break;
			case 3: return date('j F Y'); break;
		}
	}

	public function checkSession(){
		if(isset($_SESSION['UID'])) $UID = $_SESSION['UID'];
	}

	public function isLoggedIn(){
		if(isset($_SESSION['UID'])) return true;
		else return false;
	}

	public function isAdmin(){		
		$admin = $this->sql->grabData("medlemmer", "id", $_SESSION['UID'], "admin");
		if($admin >= 2) return true;
		else return false;
	}
	
	public function checkAuth() {
		if(!isset($_SESSION['UID'])) {
			header("Location: /?side=404");
		}
	}

	public function validPage(){
		if(!isset($_GET['side'])) header("Location: /?side=hjem");
	}

	public function pageHead($title){
		include($_SERVER['DOCUMENT_ROOT'].'/pages/parts/head.php');
		echo "<title>$title - ".$this->name."</title>";
	}

	public function getHeader(){
		include($_SERVER['DOCUMENT_ROOT'].'/pages/parts/header.php');
	}

	public function getFooter(){
		include($_SERVER['DOCUMENT_ROOT'].'/pages/parts/footer.php');
	}

	public function labelText($type, $title, $text){
		switch($type){
			case "SUCCESS":{
				echo "
				<div class='success_label'>
					<div class='label_text'>
						<h3><strong>$title!</strong> $text</h3>
					</div>
				</div>
				";
			} break;

			case "ERROR":{
				echo "
				<div class='error_label'>
					<div class='label_text'>
						<h3><strong>$title!</strong> $text</h3>
					</div>
				</div>
				";
			} break;
		}
	}

	public function requestData($table, $request){
		echo $this->sql->grabData($table, "id", $_GET['id'], $request);
	}

	public function requestRawData($table, $request){
		return $this->sql->grabData($table, "id", $_GET['id'], $request);
	}	

	public function requestSpecificData($table, $column, $data, $request){
		echo $this->sql->grabData($table, $column, $data, $request);
	}

	public function newMember(){
		$usr = new user;
		$usr->register();
	}

	public function getCourses(){
		$usr = new user;
		$usr->listCourses();
	}

	public function getAdminCourses(){
		$adm = new admin;
		$adm->listCourses();
	}

	public function getChapters(){
		$usr = new user;
		$usr->listChapters();
	}

	public function getAdminChapters(){
		$adm = new admin;
		$adm->listChapters();
	}

	public function newCourse(){
		$adm = new admin;
		$adm->createCourse();
	}

	public function updateCourse(){
		$adm = new admin;
		$adm->editCourse();
	}

	public function newChapter(){
		$adm = new admin;
		$adm->createChapter();
	}

	public function getChapterName(){
		$adm = new admin;
		$adm->chapterName();
	}

	public function newPost($type){
		$adm = new admin;
		$adm->createNewPost($type);
	}

	public function loadPost(){
		$usr = new user;
		$usr->loadPostText();
	}

	public function loadAdminPost(){
		$adm = new admin;
		$adm->loadPostText();
	}

	public function getChallenges(){
		$usr = new user;
		$usr->listChallenges();
	}

	public function getAdminChallenges(){
		$adm = new admin;
		$adm->listChallenges();
	}

	public function getMembers(){
		$usr = new user;
		$usr->getMemberList();
	}

	public function hideMembership(){
		$usr = new user;
		$usr->privateUser();
	}

	public function newChallenge(){
		$adm = new admin;
		$adm->createChallenge();
	}

	public function updateChallenge(){
		$adm = new admin;
		$adm->editChallenge();
	}

	public function deleteChallenge(){
		$adm = new admin;
		$adm->delChallenge();
	}

	public function login(){
		$adm = new admin;
		$adm->adminLogin();
	}

	public function listMembers(){
		$adm = new admin;
		$adm->listAllMembers();
	}

	public function listAdmins(){
		$adm = new admin;
		$adm->listAllAdmins();
	}

	public function logout(){
        $_SESSION['UID'] = 0;
        session_destroy();
        header("Location: /?side=hjem");
    }

    public function studyDropdown($study){
    	$retning = $this->requestRawData("medlemmer", "studie");
    	if($retning == $study) echo "selected";
	}

    public function findMember(){
		$adm = new admin;
		$adm->findUser();
	}

    public function editMember(){
		$adm = new admin;
		$adm->editUser();
	}

	public function getStudy($navn){
        switch($navn){
            case 'DATAING': return "Dataingeniør"; break;
            case 'ELEKING': return "Elektroingeniør"; break;
            case 'MASKING': return "Maskiningeniør"; break;
            case 'LEKTOR': return "Lektorstudent"; break;
            default: return "Ukjent"; break;
        }
    }

    public function getDegree($navn){
        switch($navn){
            case 'BACH': return "Bachelor"; break;
            case 'MAST': return "Master"; break;
            case 'STAFF': return "Lærer"; break;
            default: return "Ukjent"; break;
        }
    }

    public function getAuthor(){
    	$usr = new user;
		$usr->getAuthorName();
	}

    public function getPostDate(){
    	$usr = new user;
		$usr->getPostedDate();
    }

    public function loadNextPost(){
    	$usr = new user;
		$usr->getNextPost();
    }

    public function loadPrevPost(){
    	$usr = new user;
		$usr->getPrevPost();
	}
	
	public function listAuthorPosts(){
		$usr = new user;
		$usr->listAuthorPosts();
	}

	public function listAuthorStats(){
		$usr = new user;
		$usr->listAuthorStats();
	}
	
	public function listSEO(){
		$adm = new admin;
		$adm->SEO();
	}

}

?>
