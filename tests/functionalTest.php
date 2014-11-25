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


        //enter email address
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

        //check if profile image is correct
        $profile_img = $this->webDriver->findElement(WebDriverBy::id('profile_img'))->getAttribute('src');
        $this->assertEquals("http://localhost/imageproject/profile_images/test3.jpg", $profile_img);

        //check if first user image is loading correctly
        $this->webDriver->findElement(WebDriverBy::id('my_img0'))->click();
        $profile_img = $this->webDriver->findElement(WebDriverBy::id('image_pop'))->getAttribute('src');
        $this->assertEquals("images/test1.jpg", $profile_img);

        //check to make sure greeting is correct
        $greeting = $this->webDriver->findElement(WebDriverBy::id('greeting'))->getText();
        $this->assertEquals("Welcome Colton", $greeting);
        
        
    }   

    public function testRegistration()
    {
        $this->webDriver->get($this->url);
        // checking that page title contains word 'GitHub'
        $this->assertContains('Emerald', $this->webDriver->getTitle());
        //fills in the fields for registration
        $this->webDriver->findElement(WebDriverBy::id('fname'))->sendKeys("Jason");
        $this->webDriver->findElement(WebDriverBy::id('lname'))->sendKeys("Perez");
        $this->webDriver->findElement(WebDriverBy::id('email'))->sendKeys("jbperez2@asu.edu");
        $this->webDriver->findElement(WebDriverBy::id('pword'))->sendKeys("password");
        //clicks the submit button
        $this->webDriver->findElement(WebDriverBy::id('sub'))->click();
        /*
        //Uploads a photo, ****MUST ENTER A LOCAL IMAGE PATH IN THE SECOND LINE OF THE FOUR****
        $this->webDriver->findElement(WebDriverBy::id('image_button'))->click();
        $this->webDriver->findElement(WebDriverBy::name('imagefile'))->sendKeys('(ENTER DIRECT IMAGE PATH)');
        $this->webDriver->findElement(WebDriverBy::id('image_submit'))->click();
        $this->webDriver->findElement(WebDriverBy::link('Return'))->click();
        */
    }

}
?>
