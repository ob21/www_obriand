<div id="dokuwiki__pagetoolszenith">
	<!-- If small screen (tablet, smartphone -->
		<div class="mobileTools">
		<?php tpl_actiondropdown($lang['tools']); ?>
		</div>	
    <!-- BREADCRUMBS -->
    <div class="breadsearch">
    <?php if($conf['breadcrumbs'] || $conf['youarehere']): ?>
	
	    <div class="bread_here">
                <?php if($conf['youarehere']): ?>
                    <div class="youarehere"><?php tpl_youarehere() ?></div>
                <?php endif ?>
                <?php if($conf['breadcrumbs']): ?>
                    <div class="trace"><?php tpl_breadcrumbs() ?></div>
                <?php endif ?>
	    </div>
	    	    
	        <!-- Search&Language -->
             <div class="searchlang">
	        <?php tpl_searchform(); ?>
	<!-- Lang (only with Translation Plugin -->
	        <?php
		$translation = plugin_load('helper','translation');
		if ($translation) echo $translation->showTranslations();
	        ?>
             </div>
        
    <?php endif ?>
	</div>
<!-- Tools group : connexion, various tools -->
    <div class="tools group">
    <div class="toolszenith">
        <!-- USER TOOLS -->
        <?php if ($conf['useacl']): ?>
            <div id="dokuwiki__usertools">
                <h3 class="a11y"><?php echo $lang['user_tools']; ?></h3>
                <ul>
                    <?php
                        
                        tpl_toolsevent('usertools', array(
                            tpl_action('admin', true, 'li', true),
                            tpl_action('profile', true, 'li', true),
                            tpl_action('register', true, 'li', true),
                            tpl_action('login', true, 'li', true)
                        ));
			if (!empty($_SERVER['REMOTE_USER'])) {
                            echo '<li class="user">';
                            tpl_userinfo(); /* 'Logged in as ...' */
                            echo '</li>';
                        }
                    ?>
                </ul>
            </div>
        <?php endif ?>

        <!-- SITE TOOLS -->
        <div id="dokuwiki__sitetools">
            <h3 class="a11y"><?php echo $lang['site_tools']; ?></h3>
            <ul>
                <?php
                    tpl_toolsevent('sitetools', array(
                        tpl_action('recent', true, 'li', true),
                        tpl_action('media', true, 'li', true),
                        tpl_action('index', true, 'li', true)
                    ));
                ?>
            </ul>
        </div>
    </div>
    </div>
</div>