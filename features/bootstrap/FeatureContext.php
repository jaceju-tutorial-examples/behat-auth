<?php

use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\MinkExtension\Context\MinkContext;
use Goez\BehatLaravelExtension\Context\ApplicationTrait;
use Illuminate\Support\Facades\Auth;
use Laracasts\Behat\Context\DatabaseTransactions;
use Laracasts\Behat\Context\KernelAwareContext;
use Laracasts\Behat\Context\Migrator;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements KernelAwareContext, SnippetAcceptingContext
{
    use Migrator, DatabaseTransactions, ApplicationTrait;

    private $user;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given a user whose name is :name
     */
    public function aUserWhoseNameIs($name)
    {
        $this->user = factory(App\User::class)->create([
            'name' => $name,
        ]);
    }

    /**
     * @When user attempts to sign in
     */
    public function userAttemptsToSignIn()
    {
        $this->be($this->user);
    }

    /**
     * @Then user should be sign in
     */
    public function userShouldBeSignIn()
    {
        $this->assertTrue(Auth::check());
        $this->seeInDatabase('users', [
            'name' => $this->user->name,
        ]);
    }
}
