<?php
include '../Tbs.php';

/**
 * All tests for Tbs
 */
class TbsTest extends PHPUnit_Framework_TestCase {

    /**
     * Twitter Bootstrap
     * @var Tbs
     */
    protected $Tbs;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->Tbs = new Tbs;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * Simple Button
     * @covers Tbs::button
     */
    public function testButtonSimpleText() {
        $textButton = "I'm a button";
        $expected = '<a class="btn btn-default">' . $textButton . '</a>';
        $computed = $this->Tbs->button($textButton);
        
        return $this->assertEquals($expected,$computed);
    }
    /**
     * Button with link
     * @covers Tbs::button
     */
    public function testButtonWithLink() {
        $textButton = 'Me too';
        $expected = '<a class="btn btn-default" href="#button">' . $textButton . '</a>';
        $computed = $this->Tbs->button($textButton, '#button');
        
        return $this->assertEquals($expected,$computed);
    
    }
    /**
     * Button with Javascript onClick event
     * @covers Tbs::button
     */
    public function testButtonWithJavascript() {
        $expected = '<a onClick="javascript:alert(\'i\\\\\'m the alert\')" class="btn btn-default">I\'m a button with a JS alert</a>';
        $computed = $this->Tbs->button("I'm a button with a JS alert", null, array('onClick' => "javascript:alert('i\\\'m the alert')"));
        
        return $this->assertEquals($expected,$computed);
    
    }
    /**
     * Disabled big button
     * @covers Tbs::button
     */
    public function testButtonBigDisabledPrimaryType() {
        $expected = '<a class="btn disabled btn-lg btn-primary" href="#">Big disabled button</a>';
        $computed = $this->Tbs->button('Big disabled button', '#', array('size' => 'big', 'type' => 'primary', 'class' => 'disabled'));
        
        return $this->assertEquals($expected,$computed);
    
    }
    /**
     * Active danger button
     * @covers Tbs::button
     */
    public function testButtonActiveStateDangerType() {
        $expected = '<a class="btn active btn-danger" href="#button">Active danger button</a>';
        $computed = $this->Tbs->button('Active danger button', '#button', array('type' => 'danger', 'class' => 'active'));
        
        return $this->assertEquals($expected,$computed);
    
    }
    /**
     * Small info button
     * @covers Tbs::button
     */
    public function testButtonSmallSizeInfoType() {
        $expected = '<a class="btn btn-sm btn-info" href="#button">Small info button</a>';
        $computed = $this->Tbs->button('Small info button', '#button', array('size' => 'small', 'type' => 'info'));
        
        return $this->assertEquals($expected,$computed);
    
    }
    /**
     * Small button with icon
     * @covers Tbs::button
     */
    public function testButtonSmallSizeWithIcon() {
        $expected = '<a class="btn btn-xs btn-warning" href="#button"><span class="glyphicon glyphicon-star"></span> I have an icon !!</a>';
        $icon = $this->Tbs->icon('star');
        $computed = $this->Tbs->button($icon . ' I have an icon !!', '#button', array('size' => 'xsmall', 'type' => 'warning'));
        
        return $this->assertEquals($expected,$computed);
    
    }
    /**
     * Button submit
     * @covers Tbs::button
     */
    public function testButtonSubmit() {
        $expected = '';
        $computed = $this->Tbs->button(null, null, array('tag' => 'submit', 'value'=>'Submit button'));
        
        return $this->assertEquals($expected,$computed);
    
    }
    
    /**
     * @covers Tbs::dropdown
     * @todo   Implement testDropdown().
     */
    public function testDropdown() {
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::buttonGroup
     * @todo   Implement testButtonGroup().
     */
    public function testButtonGroup() {
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::thumbnail
     * @todo   Implement testThumbnail().
     */
    public function testThumbnail() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::thumbList
     * @todo   Implement testThumbList().
     */
    public function testThumbList() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::toolbar
     * @todo   Implement testToolbar().
     */
    public function testToolbar() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::buttonDropdown
     * @todo   Implement testButtonDropdown().
     */
    public function testButtonDropdown() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::input
     * @todo   Implement testInput().
     */
    public function testInput() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::inputSelect
     * @todo   Implement testInputSelect().
     */
    public function testInputSelect() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::formOpen
     * @todo   Implement testFormOpen().
     */
    public function testFormOpen() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::formClose
     * @todo   Implement testFormClose().
     */
    public function testFormClose() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::formGroup
     * @todo   Implement testFormGroup().
     */
    public function testFormGroup() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::inputGroup
     * @todo   Implement testInputGroup().
     */
    public function testInputGroup() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::navItem
     * @todo   Implement testNavItem().
     */
    public function testNavItem() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::nav
     * @todo   Implement testNav().
     */
    public function testNav() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::navbar
     * @todo   Implement testNavbar().
     */
    public function testNavbar() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::navbarBrand
     * @todo   Implement testNavbarBrand().
     */
    public function testNavbarBrand() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::navbarLinks
     * @todo   Implement testNavbarLinks().
     */
    public function testNavbarLinks() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::navbarForm
     * @todo   Implement testNavbarForm().
     */
    public function testNavbarForm() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::navbarButton
     * @todo   Implement testNavbarButton().
     */
    public function testNavbarButton() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::navbarText
     * @todo   Implement testNavbarText().
     */
    public function testNavbarText() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::navbarTextLink
     * @todo   Implement testNavbarTextLink().
     */
    public function testNavbarTextLink() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::paginator
     * @todo   Implement testPaginator().
     */
    public function testPaginator() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::paginatorLink
     * @todo   Implement testPaginatorLink().
     */
    public function testPaginatorLink() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::link
     * @todo   Implement testLink().
     */
    public function testLink() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::pager
     * @todo   Implement testPager().
     */
    public function testPager() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::icon
     * @todo   Implement testIcon().
     */
    public function testIcon() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::label
     * @todo   Implement testLabel().
     */
    public function testLabel() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::jumbotron
     * @todo   Implement testJumbotron().
     */
    public function testJumbotron() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::header
     * @todo   Implement testHeader().
     */
    public function testHeader() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::image
     * @todo   Implement testImage().
     */
    public function testImage() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::alert
     * @todo   Implement testAlert().
     */
    public function testAlert() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::badge
     * @todo   Implement testBadge().
     */
    public function testBadge() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::breadcrumbs
     * @todo   Implement testBreadcrumbs().
     */
    public function testBreadcrumbs() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::progressBar
     * @todo   Implement testProgressBar().
     */
    public function testProgressBar() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::progressBarStack
     * @todo   Implement testProgressBarStack().
     */
    public function testProgressBarStack() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::mediaItem
     * @todo   Implement testMediaItem().
     */
    public function testMediaItem() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::mediaList
     * @todo   Implement testMediaList().
     */
    public function testMediaList() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::listGroup
     * @todo   Implement testListGroup().
     */
    public function testListGroup() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::panel
     * @todo   Implement testPanel().
     */
    public function testPanel() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::embed
     * @todo   Implement testEmbed().
     */
    public function testEmbed() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::well
     * @todo   Implement testWell().
     */
    public function testWell() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::jModal
     * @todo   Implement testJModal().
     */
    public function testJModal() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::jScrollspy
     * @todo   Implement testJScrollspy().
     */
    public function testJScrollspy() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::jTab
     * @todo   Implement testJTab().
     */
    public function testJTab() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::jTooltip
     * @todo   Implement testJTooltip().
     */
    public function testJTooltip() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::jPopover
     * @todo   Implement testJPopover().
     */
    public function testJPopover() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::jAlert
     * @todo   Implement testJAlert().
     */
    public function testJAlert() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::jButton
     * @todo   Implement testJButton().
     */
    public function testJButton() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::jCollapse
     * @todo   Implement testJCollapse().
     */
    public function testJCollapse() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::jCarousel
     * @todo   Implement testJCarousel().
     */
    public function testJCarousel() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Tbs::jAffix
     * @todo   Implement testJAffix().
     */
    public function testJAffix() {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
        );
    }

}
