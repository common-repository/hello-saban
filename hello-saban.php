<?php
/**
 * @package Hello_Saban
 * @version 1.6
 */
/*
Plugin Name: Hello Saban
Plugin URI: https://wordpress.org/plugins/hello-saban/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation of Alabama football fans.
Author: Nathan Ingram
Version: 0.1
Author URI: https://nathaningram.com
Text Domain: hello-saban
*/


/////////////////// Hello Saban Quotes

function hello_saban_get_quote() {
	$quotes = "Make his ass quit. 
Mediocre people don’t like high achievers and high achievers don’t like mediocre people.
There are two pains in life. There is the pain of discipline and the pain of disappointment. If you can handle the pain of discipline, then you’ll never have to deal with the pain of disappointment. 
We have an opponent in this state that we work every day, 365 days a year, to dominate. 
What happened yesterday is history. What happens tomorrow is a sabanstery. What we do today makes a difference. 
You've been wrong five years in a row and every year we've won it, you haven't picked us. But I'm rooting for you.
I’m very happy at Alabama. Miss Terry’s very happy at Alabama. This is where we choose to end our career someday. 
A'ight. 
I don’t think it’s about who you play, I think it’s about who you are. 
Eliminate the clutter and all of the things that are going on outside and focus on the things that you can control with how you go about and take care of your business. 
Take the other team out of the game and make it all about you and what you do. 
Process guarantees success. A good process produces good results. 
That issue has gone under the bridge, under the next bridge, over the next dam and is gone. 
As bad as you think you want to win it. I promise you the guys that go out there and work every day... they want to win it more than that. And I'm going to feel a hell of a lot worse for them than you if they don't. 
Everybody hits me up for eating Little Debbies, but no one passes that cookie jar without taking one. 
What happened yesterday is history. What happens tomorrow is a sabanstery. What we do today makes a difference. 
You can't kick people out of your family. There's never been a player that I've kicked off the team that ever amounted to anything.
It's a game that 365 days a year everybody has got to live with the results. 
One thing about championship teams is that they’re resilient. No matter what is thrown at them, no matter how deep the hole, they find a way to bounce back and overcome adversity. 
They ran through our ass like shit through a tin horn, man, and we could not stop them. We could not stop them. Could not stop them.
I don't like to lose. I don't expect to lose. 
The process of repeating as national champion requires more attention. It can't be about trying to prove something, because you've kind of already done that.
Do you want to be the best you can be? Are you driven to be the best player you can be? Are you driven to have the intensity, the sense of urgency, the intelligence. Are you going to work to do the things you need to do to be your absolute best? And that's not normal. Everybody thinks it's normal, but it's not normal. 
The expectations are what they are here, and we don't run around talking about them. 
Football is not Hamlet. It's not tragedy. It should be fun. 
I think I’m pretty misunderstood, because I’m not just about football.
I just want everybody to know I'm not conservative. I want to throw the ball all the time. 
There were no arguments, those are called ass-chewings.
The process is really what you have to do day in and day out to be successful, we try to define the standard that we want everybody to sort of work toward, adhere to, and do it on a consistent basis. 
The things that I talked about before, being responsible for your own self-determination, having a positive attitude, having great work ethic, having discipline to be able to execute on a consistent basis, whatever it is you're trying to do, those are the things that we try to focus on, and we don't try to focus as much on the outcomes as we do on being all that you can be.
It's not human nature to be great. It's human nature to survive, to be average and do what you have to do to get by. That is normal. When you have something good happen, it's the special people that can stay focused and keep paying attention to detail, working to get better and not being satisfied with what they have accomplished.
Success doesn't come from pie-in-the-sky thinking. It's the result of consciously doing something each day that will add to your overall excellence.
Becoming a champion is not an easy process... It is done by focusing on what it takes to get there and not on getting there.
We create a standard for how we want to do things and everybody's got to buy into that standard or you really can't have any team chemistry.
Mediocre people don't like high-achievers and high-achievers don't like mediocre people.
We're not going to talk about what we're going to accomplish, we're going to talk about how we're going to do it.
One thing about championship teams is that they're resilient. No matter what is thrown at them, no matter how deep the hole, they find a way to bounce back and overcome adversity.
Live by the creed that a strong work ethic, playing by the rules, and doing things the right way will bring about opportunities for success and, ultimately, happiness.
Focus on the process of what it takes to be successful.
I don’t care what you did yesterday. If you’re happy with that, you have bigger problems.
Your character is your accumulation of your thoughts, habits and priorities on a day-to-day basis.
We have got to use every opportunity to improve individually so we can improve collectively.
You can't win together if you don't work together.
Eliminate the clutter and all the things that are going on outside and focus on the things that you can control with how you sort of go about and take care of your business.
I'm tired of hearing all this talk from people who don't understand the process of hard work-like little kids in the back seat asking 'Are we there yet?' Get where you're going 1 mile-marker at a time.
Be all you can be in whatever you choose to do. The sky is the limit, so go for it. And do not create any self-imposed limitations.
There is no continuum for success. Focus on the progress, not the results.
The formula for success is every guy can make a difference for the entire team in whatever his role is. And to do it right, to get it right, is a critical factor in being successful.
Be on time because it shows you care.";

	// Here we split it into lines
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a line
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_saban() {
	$chosen = hello_saban_get_quote();
	echo "<p id='saban'>&ldquo;$chosen&rdquo; &mdash; Nick Saban</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_saban' );

// We need some CSS to position the paragraph
function saban_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#saban {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'saban_css' );




/////////////////// Change the Login Logo and Background

function saban_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo plugin_dir_url( '' , __FILE__ ); ?>/hello-saban/images/tide-logo.svg) !important;
            height:125px;
			width:125px;
			background-size: 125px 125px;
			background-repeat: no-repeat;
        }
        
        body.login {
			background-image: url(<?php echo plugin_dir_url( '' , __FILE__ ); ?>/hello-saban/images/stadium-background.jpg) !important;
			background-position: left center;
			background-size: cover;
		}
		
		body.login #nav {
			background: #fff;
			margin: 0;

			text-align: center;
		}
		
		body.login #backtoblog {
			background: #fff;
			padding-top: 16px;
			padding-bottom: 16px;
			margin: 0;
			text-align: center;
		}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'saban_login_logo' );



/////////////////// Play Rammer Jammer

add_action('wp_login', 'rammer_jammer_sound_setflag', 10, 2);
add_action('admin_footer', 'rammer_jammer_actually_playsound');
add_action('admin_bar_menu', 'rammer_jammer_toolbar', 999);
add_action( 'admin_enqueue_scripts', 'rammer_jammer_load_scripts');


// Set flag to indicate that user has logged in and Rammer Jammer needs to play. 

function rammer_jammer_sound_setflag($user_login, $user)
{
	update_user_meta($user->ID, 'rammer_jammer_playsound', 1);
}

// Play Rammer Jammer on login 

function rammer_jammer_actually_playsound()
{
	if (get_user_meta( get_current_user_id(), 'rammer_jammer_playsound', true ) == 1)
	{	
		update_user_meta(get_current_user_id(), 'rammer_jammer_playsound', 0);
		?>
		<audio  autoplay>
  			<source src="<?php echo plugins_url( 'sound/rammer-jammer.mp3', __FILE__ ); ?>" type="audio/mpeg">
		</audio>
		<?php
	}
}

// Load required scripts in the backend.
function rammer_jammer_load_scripts() 
{
	wp_register_script('howler', plugins_url( 'howler.min.js', __FILE__ ));
	wp_register_script('rammer-jammer', plugins_url( 'rammer-jammer.js', __FILE__ ), array( 'jquery', 'howler'));
	wp_enqueue_script('rammer-jammer');
	wp_localize_script('rammer-jammer', 'rammer-jammer_vars', array('url' => plugins_url( '/sound/rammer-jammer.mp3', __FILE__ )));
}











