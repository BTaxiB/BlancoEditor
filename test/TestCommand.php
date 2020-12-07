<?php 
//editable aaaaaaaaa
CHANGEDeee

use Facebook\WebDriver\Exception\WebDriverException;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverKeys;
use Facebook\WebDriver\WebDriverSelect as SELECT;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
/**
 * @author Dejana Radojevic 
 */
class GotPornCommand extends QueueCommand
{
    protected $tubeName;
    protected $driver;
    protected static $defaultName = 'GotPornCommand';
    /**
     * GotPornCommand constructor.
     */
    public function __construct(?string $name = null)
    {
        $this->tubeName = 'https://www.gotporn.com/';
        parent::__construct($name);
    }
    /**
     * @return int|void|null
     */
    public function phpshutdown($id, $tstart)
    { //kills session on php timeout
        if ($this->driver->getWindowHandles()) {
            $execDuration = microtime(true) - $tstart;
            dump($execDuration);
            $execCond = $execDuration + 10 - $this->execTime;
            $ss = md5($this->tubeName).'_'.date('Y-m-d H:i:s').'_error.png';
            $this->takeFullScreenshot("{$this->screenPath}{$ss}");
            $this->setSS($id, $ss);
            $this->driver->quit();
            if ($execCond > 0) {
                $this->breakLine('Bot execution time exceeded!', $id);
            } else {
                $this->breakLine('Bot crashed unexpectedly!', $id);
            }
        }
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        // Check queue
        $io->note('checking queue');
        $conn = $this->checkQueue();
        $io->note('checking queue');
        if ('JOBS DO NOT EXIST' === $conn) {
            $io->note(sprintf($conn));
            exit();
        }
        set_time_limit(3600); //script execution time
        $item = $this->getProgress($conn[0], $this->driver->getSessionID());
        if ($item) {
            try {
                register_shutdown_function([&$this, 'phpshutdown'], $item->item_id, microtime(true));
                // $item->file = $this->path.'/'.$item->file;
                $this->driver->get('https://uploadcenter.gotporn.com/login');
                //editable account
$this->driver->findElement(WebDriverBy::name('username'))->click()->sendKeys($item->username);

                $this->driver->findElement(WebDriverBy::className('btn-block'))->click();
                sleep(1);
                $this->updateProgress($item->item_id, 20);
                //editable Video Url
$this->driver->findElement(WebDriverBy::id('image_file'))->sendKeys($item->file);

                $this->updateProgress($item->item_id, 30);
                //editable Video TItle
$this->driver->findElement(WebDriverBy::id('videoTitleInput'))->sendKeys($item->longTitle);

                //editable Video Description
$this->driver->findElement(WebDriverBy::id('videoDesc'))->sendKeys($item->description);

                    $select = new Select($this->driver->findElement(WebDriverBy::id('selectChannel')));
                    $options = $select->getOptions();
                    foreach ($options as $o) {
                        $status = false;
                        $target = preg_replace("/\s+/", '', $o->getText());
                        $check = strcmp($target, $item->paysite);
                        if (0 == $check) {
                            $select->selectByVisibleText($o->getText());
                            $status = true;
                            break;
                        }
                    }
                    if (!$status) {
                        $ss = md5($this->tubeName).'_'.date('Y-m-d H-i-s').'_error.png';
                        $this->takeFullScreenshot("{$this->screenPath}{$ss}");
                        $this->setSS($item->item_id, $ss);
                        $this->breakLine("Paysite $item->paysite failed to select!", $item->item_id);
                        $this->driver->quit();
                        die();
                    }
                }
                $this->updateProgress($item->item_id, 50);
                $promoexists = $this->driver->findElements(WebDriverBy::id('link_title'));
                if (!empty($promoexists)) {
                    $this->driver->findElement(WebDriverBy::id('link_title'))->sendKeys('https://uploadcenter.gotporn.com/');
                    $this->driver->findElement(WebDriverBy::id('link_url'))->sendKeys('https://uploadcenter.gotporn.com/');
                }
                $channelexists = $this->driver->findElements(WebDriverBy::id('selectChannel'));
                if (!empty($channelexists)) {
                    $paysite = $this->sanitizeString($item->paysite);
                    $channelexists[0]->click();
                    $this->driver->wait()->until(WebDriverExpectedCondition::visibilityOfElementLocated(WebDriverBy::xpath("//select[@id='selectChannel']/option[contains(translate(text(), '".strtoupper($paysite)." ', '".strtolower($paysite)."'), '".strtolower($paysite)."')]")));
                    $this->driver->findElement(WebDriverBy::xpath("//select[@id='selectChannel']/option[contains(translate(text(), '".strtoupper($paysite)." ', '".strtolower($paysite)."'), '".strtolower($paysite)."')]"))->click();
                }
                $this->updateProgress($item->item_id, 60);
                $orientationRadios = $this->driver->findElement(WebDriverBy::id('orientationRadios'));
                $radio = $orientationRadios->findElements(WebDriverBy::className('btn-radio'));
                $this->updateProgress($item->item_id, 70);
                if (1 === $item->type) {
                    $radio[0]->click();
                } elseif (2 === $item->type) {
                    $radio[1]->click();
                } elseif (3 === $item->type) {
                    $radio[2]->click();
                }
                //editable Category
$count = 0;

                    $carray = $this->driver->findElements(WebDriverBy::xpath('//*[@id="categoryList"]//label[contains(text(),"'.ucwords($category).'")]'));
                    if ($carray && $count < 3) {
                        if ($carray[0]->isEnabled() && $carray[0]->isDisplayed()) {
                            $carray[0]->click();
                            ++$count;
                        }
                    }
                }
                //Tags
                $i = $this->driver->findElement(WebDriverBy::className('bootstrap-tagsinput'))->click();
                $count = 0;
                foreach ($item->tags as $tag) {
                    $i->findElement(WebDriverBy::tagName('input'))->sendKeys([$tag, WebDriverKeys::ENTER]);
                    ++$count;
                    if (16 === $count) {
                        break;
                    }
                }
                $this->updateProgress($item->item_id, 90);
                //Pornstars
                $pornstars = $this->driver->findElement(WebDriverBy::className('outer-tags-wrap'));
                $a = $pornstars->findElement(WebDriverBy::className('bootstrap-tagsinput'));
                foreach ($item->actors as $actor) {
                    $a->findElement(WebDriverBy::tagName('input'))->sendKeys([$actor, WebDriverKeys::ENTER]);
                }
//                        $this->driver->executeScript('window.scrollTo(0,document.body.scrollHeight);');
                $this->driver->executeScript('scroll(0, 0);');
                $this->driver->wait(3600, 2000)->until(WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::id('submitButton')));
                // $this->driver->executeScript('scroll(1500, 2000);');
                $this->driver->findElement(WebDriverBy::id('submitButton'))->click();
                // sleep(4);
                $this->driver->executeScript('scroll(0, 0);');
                $this->driver->wait(100, 500)->until(WebDriverExpectedCondition::visibilityOfElementLocated(WebDriverBy::xpath('//*[@id="mainResponse"]/h4[.="Upload successful!"]')));  //already uploaded or error after submit
                $ss = md5($this->tubeName).'_'.date('Y-m-d H:i:s').'_success.png';
                $this->takeFullScreenshot("{$this->screenPath}{$ss}");
                $this->setSS($item->item_id, $ss);
                $this->updateProgress($item->item_id, 100);
                $this->releaseItem($item->item_id);
                $this->driver->quit();
            } catch (WebDriverException $e) {
                $ss = md5($this->tubeName).'_'.date('Y-m-d H:i:s').'_error.png';
                $this->takeFullScreenshot("{$this->screenPath}{$ss}");
                $this->setSS($item->item_id, $ss);
                $error = explode("\n", $e->getMessage());
                $this->breakLine($error[0], $item->item_id);
                $this->driver->quit();
            }
        }
    }
}
                $error = explode("\n", $e->getMessage());
                $this->breakLine($error[0], $item->item_id);
                $this->driver->quit();
            }
        }
    }
}
  }
}
                $error = explode("\n", $e->getMessage());
                $this->breakLine($error[0], $item->item_id);
                $this->driver->quit();
            }
        }
    }
}

