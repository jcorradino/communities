<?php

    $concat = has_screen_name( $profile_user->ID ) ? '?post-type=' : '&post-type=';

    $a_tabs = array(
        "Community Activity" => $author_url . $concat . 'recent',
        "About Me" => $author_url . $concat . 'aboutme'
    );
  
    $a_navigation = array(
        "recent" => array(
            "name" => "Recent Activity",
            "url" => $author_url . $concat . 'recent'
        ),
        "question" => array(
            "name" => "Questions",
            "url" => $author_url . $concat . 'question'
        ),
        /*
        "" => array(
            "name" => "Comments",
            "url" => $author_url . $concat . ''
        ),*/
         "comment" => array(
            "name" => "Comments",
            "url" => $author_url . $concat . 'comment'
        ),
        
        "answer" => array(
            "name" => "Answers",
            "url" => $author_url . $concat . 'answer'
        ),
       
        "follow" => array(
            "name" => "Follows",
            "url" => $author_url . $concat . 'follow'
        ),
        "upvote" => array(
            "name" => "Helpful Votes",
            "url" => $author_url . $concat . 'upvote'
        )      ,
        "post" => array(
            "name" => "Posts",
            "url" => $author_url . $concat . 'post'
        ),
        "guides" => array(
            "name" => "Buying Guides",
            "url" => $author_url . $concat . 'guides'
        )
    );
  
?>

<?php
    # if a user is looking at another's profile, show the crest
    if( $profile_type != 'myprofile' && $_REQUEST['post-type'] != 'aboutme' ):
?>
<div class="profile-summary clearfix">
<?php
    $crest_options = array(
        "user_id"   => $profile_user->ID, 
        "show_name" => false, 
        "width"     => 'span2'
    );
    if ( $profile_user->roles[0] == 'communityexpert' ) {
        $crest_options["titling"] = true;
    }
    
    get_partial( 'parts/crest', $crest_options );
?>
    <div class="span10 info"><h2><?php get_screenname( $profile_user->ID ); ?></h2></div>
</div>
<?php endif; ?>

<?php
    # if a user is looking at themselves, show the tabs
    if( $profile_type == 'myprofile' ):
?>
<nav class="clearfix">
  <ul class="tabs clearfix">
    <?php
    foreach ( $a_tabs as $lone_tab => $tab_url ) {
      if ( $lone_tab == $current_tab ) {
        echo '<li class="active">' . $lone_tab . '</li>';
      }
      else {
        echo '<li><a href="' . $tab_url . '">' . $lone_tab . '</a></li>';
      }
    }
    ?>
  </ul>
</nav>
<?php endif; ?>

<?php
    # show the sub tab bar only if a user is not on the About Me page and if they actually have any activity
    if( $_REQUEST['post-type'] != 'aboutme' && !empty( $available_tabs ) ): 
?>
<nav class="bar clearfix">
    <ul class="clearfix">
<?php
    if($current_tab == 'Community Activity') {

        foreach ($a_navigation as $lone_nav_id => $lone_nav) {

            if ( in_array($lone_nav_id, $available_tabs) ) {

                if ( $lone_nav_id == $current_nav ) {

                    echo '<li class="active">' . $lone_nav["name"] . '</li>';
                }

                else {

                    echo '<li><a href="' . $lone_nav["url"] . '">' . $lone_nav["name"] . '</a></li>';

                }
            }
        }
    }
?>
    </ul>
</nav>
<?php endif; ?>

<?php
    # catch the circumstance where the user has not yet done anything on the site.
    if( $_REQUEST['post-type'] != 'aboutme' && empty( $available_tabs ) && $profile_type == 'myprofile' ):
?>
    <section class="no-activity">
        Get out there and show us what you're all about!
    </section>
<?php endif; ?>