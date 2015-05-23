<?php
/**
 * @package Hello_Darth
 * @version 0.2
 */
/*
Plugin Name: Hello Darth
Plugin URI: http://wordpress.org/extend/plugins/hello-darth/
Description: This little plugin is in homage to my geek friends who love to hate Lord Vader. When activated you will randomly see a quote from <a href="http://www.imdb.com/character/ch0000005/quotes">Darth Vader's IMDB page</a> in the upper right of your admin screen on every page. HT to <a href="http://ma.tt">Matt Mullenberg</a> for the original code. <a href="https://wordpress.org/support/plugin/hello-darth">Support and suggestions</a> are welcome. 
Author: Adam McLane | @mclanecreative
Version: 0.2
Author URI: http://adammclane.com/
*/

function hello_darth_get_quote() {
	/** These are Darth Vader Quotes */
	$quotes = "Heh, you never know, I tend to be popular with the ladies. 
	We do it all the time, don't we, Snips?
	The rebels are unprepared for our attack. Signal Vice-Admiral Thrawn to launch his TIE squadrons immediately.
	You left me for dead! Luckilly Hondo pulled me out of the wreckage.  
	You should be more patient, Master. After all, the Count is an elderly gentleman and doesn't move like he used to. 
	It's our job to instruct and inspire.
	Hey, when I show off, it is instructive. 
	When I finished constructing my lightsaber. Ob-Wan said to me: Anakin, this weapon is your life. This weapon is my life.
	I'll sleep after we find General Grievous.
	Master, I haven't always been a patient student, but I have proven myself. I am a Jedi Knight. I won't fail you. 
	And Princess Leia is your sister!
	No, Luke. I am your father! 
	Turn to the dark side, and join me.
	Feel the power of the Dark Side!
	I'm sorry, master. You were right. It was a trap, laid out by the Sith, and I ran headlong into it... but I emerged victorious!
	First rule of war: listen and obey your superiors. 
	I see why they call you the best bounty hunter in the galaxy. 
	I just hope you're a fast swimmer.
	Here's where the fun begins. Hang on!
	By situation he means: big explosion. We're gonna need a rescue. 
	No. I've also found that we sometimes fall short of victory because of our methods.
	You lack faith in the Jedi. 
	You underestimate the power of the dark side of spoofing subtitles of German dialogue.
	I'm going to make you pay for what you've done.
	Prepare to be boarded, Captain.
	It's when things don't go as planned that we Jedi are at our best. Trust me. 
	You're a Jedi, aren't you? All Jedi carry lightsabers.
	You're awful slow for a Jedi. 
	Don't get cocky. 
	How a buch of drunken pirates managed to catch Dooku when we couldn't. 
	That's just it. How can I become a Jedi Master if I'm always getting caught? 
	You'll find I like to do things differently from time to time. 
	Actually, I plan to let the clones execute you. Right now.
	Eh... it blew up.
	There's a good chance we're about to destroy all life on this planet, including the Senator's, so, yes. I'm on edge. Why aren't you? 
	So this is the belly of the beast. 
	Everything I know I learned from you. 
	I don't need mind tricks to get you to talk.
	I'm tired of all this. Our love should not be hidden like it's some kind of immoral thing!
	As long as she lives, I will always control you.
	The Empire will provide whatever you require.
	There can be only one... apprentice.
	Enough with the revenge thing, Maul. You need to reach your centre. Go to your dark place.
	What? Hey, it's not my fault. You were supposed to study the holomaps. 
	I have trained you well, but you still have much to learn.
	There are many things you have yet to understand. 
	Asteroids do not concern me, Admiral. I want that ship, not excuses. 
	He will join us or die, my master. 
	If you only knew the power of the Dark Side. Obi-Wan never told you what happened to your father. 
	Your destiny lies with me Skywalker. Obi-Wan knew this to be true. 
	You are beaten. It is useless to resist. Don't let yourself be destroyed as Obi-Wan did.
	Apology accepted, Captain Needa. 
	You have failed me for the last time, Admiral.
	Join me, and together we can rule the galaxy as father and son. 
	The Rebels are alerted to our presence. 
	You have learned much, young one. 
	Move the ship out of the asteroid field so that we can send a clear transmission. 
	Give yourself to the Dark Side. 
	I hope so, Commander, for your sake. The Emperor is not as forgiving as I am. 
	Obi-Wan has taught you well. 
	Do they have a code clearance? 
	The Death Star will be completed on schedule. 
	That name no longer has any meaning for me! 
	NOOOOOOOOOO! 
	A tremor in the Force. The last time I felt it was in the presence of my old master. 
	The plans you refer to will soon be back in our hands. 
	Don't be too proud of this technological terror you've constructed. The ability to destroy a planet is insignificant next to the power of the Force. 
	I told you she would never consciously betray the Rebellion. 
	We meet again, at last. The circle is now complete.
	The Force is strong with this one.
	Your powers are weak, old man. 
	This will be a day long remembered. It has seen the end of Kenobi, it will soon see the end of the Rebellion. 
	Don't act so surprised, Your Highness. You weren't on any mercy mission this time.
	I want access to the temple's signal beacon. 
	Your fate is now our own.
	You have done well, my apprentice. 
	What is thy bidding, my Master? 
	I have trained you well, but you still have much to learn. 
	Enough with the revenge thing, Maul. You need to reach your centre. Go to your dark place. 
	The Empire will provide whatever you require. 
	Your feelings for her are not real. 
	As long as she lives, I will always control you. 
	Do not suffer your father's fate. 
	Impressive. Most impressive. You have fought well, bounty hunter. Indeed you are powerful.
	I am Lord Vader... and I have come for the Ring. 
	Prepare to be boarded, Captain. 
	It's true! And Princess Leia is your sister! 
	Don't make me destroy you. 
	I see why they call you the best bounty hunter in the galaxy. 
	Hunt down this new enemy. And if they will not serve the Empire, eliminate them along with any surviving Jedi who trained them. 
	It seems in your anger, you killed her. 
	The rebels are unprepared for our attack. 

	";

	// Here we split it into lines
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a line
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_darth() {
	$chosen = hello_darth_get_quote();
	echo "<p id='darth'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_darth' );

// We need some CSS to position the paragraph
function darth_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#darth {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'darth_css' );

?>
