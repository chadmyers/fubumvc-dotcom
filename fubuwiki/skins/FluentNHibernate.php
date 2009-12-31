<?php
/**
 * Fluent NHibernate
 *
 * @todo document
 * @package MediaWiki
 * @subpackage Skins
 */

if( !defined( 'MEDIAWIKI' ) )
	die();

/** */
require_once('includes/SkinTemplate.php');

/**
 * Inherit main code from SkinTemplate, set the CSS and template filter.
 * @todo document
 * @package MediaWiki
 * @subpackage Skins
 */
class SkinFluentNHibernate extends SkinTemplate {
	/** Using FluentNHibernate. */
	function initPage( &$out ) {
		SkinTemplate::initPage( $out );
		$this->skinname  = 'fluentnhibernate';
		$this->stylename = 'fluentnhibernate';
		$this->template  = 'FluentNHibernateTemplate';
	}
}

/**
 * @todo document
 * @package MediaWiki
 * @subpackage Skins
 */
class FluentNHibernateTemplate extends QuickTemplate {
	/**
	 * @access private
	 */
	function execute() {
		// Suppress warnings to prevent notices about missing indexes in $this->data
		wfSuppressWarnings();

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php $this->text('lang') ?>" lang="<?php $this->text('lang') ?>" dir="<?php $this->text('dir') ?>">
  <head>
    <title><?php $this->text('pagetitle') ?></title>
    <meta http-equiv="Content-Type" content="<?php $this->text('mimetype') ?>; charset=<?php $this->text('charset') ?>" />
    <?php $this->html('headlinks') ?>
    <style type="text/css" media="screen,projection">/*<![CDATA[*/ @import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/main.css"; /*]]>*/</style>
    <link rel="stylesheet" type="text/css" <?php if(empty($this->data['printable']) ) { ?>media="print"<?php } ?> href="<?php $this->text('stylepath') ?>/common/commonPrint.css" />
    <?php if($this->data['jsvarurl'  ]) { ?><script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('jsvarurl'  ) ?>"></script><?php } ?>
    <script type="<?php $this->text('jsmimetype') ?>" src="<?php                                   $this->text('stylepath' ) ?>/common/wikibits.js"></script>
    <?php if($this->data['usercss'   ]) { ?><style type="text/css"><?php              $this->html('usercss'   ) ?></style><?php    } ?>
    <?php if($this->data['userjs'    ]) { ?><script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('userjs'    ) ?>"></script><?php } ?>
    <?php if($this->data['userjsprev']) { ?><script type="<?php $this->text('jsmimetype') ?>"><?php      $this->html('userjsprev') ?></script><?php   } ?>
    <?php if($this->data['trackbackhtml']) print $this->data['trackbackhtml']; ?>
  </head>
  <body>
    <p id="p-personal">
	    <?php foreach($this->data['personal_urls'] as $key => $item) {
	       ?><a href="<?php
	       echo htmlspecialchars($item['href']) ?>"<?php
	       if(!empty($item['class'])) { ?> class="<?php
	       echo htmlspecialchars($item['class']) ?>"<?php } ?>><?php
	       echo htmlspecialchars($item['text']) ?></a> <?php
	    } ?>
  	</p>
  	
    <div id="titleBar">
      <a href="/">FubuMVC <span>wiki</span></a>
      <br/>
      <span class="small-title-link">[<a href="http://www.fubumvc.com">FubuMVC home</a>]</span>
    </div>
    
    <div id="globalWrapper">
      <div id="column-content">
      	<div id="content">
      	  <a name="top" id="contentTop"></a>
      	  <?php if($this->data['sitenotice']) { ?><div id="siteNotice"><?php $this->html('sitenotice') ?></div><?php } ?>
      	  
      	  <h1 class="firstHeading"><?php $this->text('title') ?></h1>
      	  
      	  <div id="bodyContent">
      	    <h3 id="siteSub"><?php $this->msg('tagline') ?></h3>
      	    <div id="contentSub"><?php $this->html('subtitle') ?></div>
      	    <?php if($this->data['undelete']) { ?><div id="contentSub"><?php $this->html('undelete') ?></div><?php } ?>
      	    <?php if($this->data['newtalk'] ) { ?><div class="usermessage"><?php $this->html('newtalk')  ?></div><?php } ?>
      	    <!-- start content -->
      	    <?php $this->html('bodytext') ?>
      	    <?php if($this->data['catlinks']) { ?><div id="catlinks"><?php $this->html('catlinks') ?></div><?php } ?>
      	    <!-- end content -->
      	    <div class="visualClear"></div>
      	  </div>
      	</div>
      </div>
    </div>
    
    <div class="visualClear"></div>
    
    <p id="p-cactions">
	    <?php foreach($this->data['content_actions'] as $key => $action) {
  	       ?><a href="<?php echo htmlspecialchars($action['href']) ?>"><?php echo htmlspecialchars($action['text']) ?></a> <?php
  	     } ?>
  	</p>
    <p id="footer"><a href="http://creativecommons.org/licenses/by-nc-sa/3.0/">Creative commons</a> licensed. <a href="http://www.mediawiki.org/">MediaWiki</a></p>
    <?php $this->html('reporttime') ?>
    <div id="p-search">
	    <form name="searchform" action="<?php $this->text('searchaction') ?>" id="searchform">
	      <input id="searchInput" name="search" type="text"
	        <?php if($this->haveMsg('accesskey-search')) {
	          ?>accesskey="<?php $this->msg('accesskey-search') ?>"<?php }
	        if( isset( $this->data['search'] ) ) {
	          ?> value="<?php $this->text('search') ?>"<?php } ?> />
	        <input type='submit' name="fulltext" class="searchButton" value="<?php $this->msg('search') ?>" />
	    </form>
	    <br />	    
	  </div>
  </body>
</html>
<?php
	wfRestoreWarnings();
	}
}
?>
