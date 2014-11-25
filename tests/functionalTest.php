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

    protected $url = 'http://localhost/imageproject/index.php';//running the tests locally
    //could possibly use $url = 'http://104.131.175.206/emerald/'

    public function testLogin()
    {
        $this->webDriver->get($this->url);
        // checking that page title contains word 'GitHub'
        $this->assertContains('Emerald', $this->webDriver->getTitle());

        $this->webDriver->findElement(WebDriverBy::id('login_email'))->clear();
        $this->webDriver->findElement(WebDriverBy::id('login_email'))->sendKeys("colt@asu.edu");
        $email_value = $this->webDriver->findElement(WebDriverBy::id('login_email'))->getAttribute('value');
       
        //this is how you get the inner text
        //$this->webDriver->findElement(WebDriverBy::id('login_email'))->getText();
       
        //checks to make sure keys were entered into login email textbox
        $this->assertEquals("colt@asu.edu", $email_value);

        $this->webDriver->findElement(WebDriverBy::id('login_password'))->clear();
        $this->webDriver->findElement(WebDriverBy::id('login_password'))->sendKeys("root");

        $this->webDriver->findElement(WebDriverBy::id('login_button'))->click();
        
        //checks to make sure the password was entered into the login password textbox
        //$this->assertEquals(
            //'matt1',
            //$this->webDriver->findElement(WebDriverBy::id('login_password'))->getText()
        //);
    }   

}
?>