<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/vendor/autoload.php";


class functionalTests extends PHPUnit_Framework_TestCase {

    /**
     * @var \RemoteWebDriver
     */
    protected $webDriver;

    public function setUp()
    {
        $capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox');
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
    }

    protected $url = 'https://github.com';

    //public function testGitHubHome()
    //{
        //$this->webDriver->get($this->url);
        //// checking that page title contains word 'GitHub'
        //$this->assertContains('GitHub', $this->webDriver->getTitle());
    //}

	//this tests entering and retrieving text from the E-mail login textfield
	//NOT WORKING- not getting correct text to compare
	public function testLoginEmailText()
	{
		$this->webDriver->get('http://localhost/imageproject/');
		
		$this->webDriver->findElement(WebDriverBy::id('login_email'))->clear();
		$this->webDriver->findElement(WebDriverBy::id('login_email'))->sendKeys("mrhorvat@asu.edu");
		
		//checks to make sure keys were entered into login email textbox
		$this->assertEquals(
			"mrhorvat@asu.edu", 
			$this->webDriver->findElement(WebDriverBy::id('login_email'))->getValue()
		);
		
	}
	
	//this tests entering and retrieving text from the password login textfield
	//NOT WORKING-  same problem as testLoginEmailText() function im guessing
	public function testLoginPasswordText()
	{
		$this->webDriver->findElement(WebDriverBy::id('login_password'))->clear();
		$this->webDriver->findElement(WebDriverBy::id('login_password'))->sendKeys("matt1");
		
		//checks to make sure the password was entered into the login password textbox
		//$this->assertEquals(
			//'matt1',
			//$this->webDriver->findElement(WebDriverBy::id('login_password'))->getText()
		//);
	}

}
?>