<?php
/*
Plugin Name: Quote Master
Plugin URI: http://webdesign.vasculus.com/?page_id=14
Description: This adds random quotes to the admin dashboard, as well as features new widget.
Author: Frank Corso
Version: 1.4.1
Author URI: http://www.vasculus.com/
*/

/*  Copyright 2009, fpcorso  (email : fpcorso@vasculus.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
function get_quotes() 
{

$quotes="Success is how high you bounce when you hit bottom
Success is never final
Success is the ability to go from failure to failure without losing your enthusiasm
Success isn't the result of a spontaneous combustion, you must set yourself on fire
Try not to become a man of success but rather to become a man of value
Life isn't a matter of milestones, but of moments
A wise man can see more from the bottom of a well than a fool can from a mountain top
Think it more satisfactory to live richly than to die rich
We make a living by what we get, but we make a life by what we give
He who knows nothing, doubts nothing
He who knows most knows best how little he knows
Relinquishing power can be the most powerful thing that can be done
Never trouble trouble till trouble troubles you
A journey of a thousand miles begins with a single step
People with goals succeed because they know where they're going
It is never to late to be what you might have been
Luck is a matter of preparation meeting opportunity
The wisest mind has something yet to learn
Science is organized knowledge. Wisdom is organized life
Life consists not in holding good cards, but in playing well those you do hold
Somebody is always doing what someone else said couldn't be done
The greatest obstacle to discovery is not ignorance - it is the illusion of knowledge
To acquire knowledge, one must study; but to acquire wisdom, one must observe
Wisdom outweighs any wealth
Dream as if you'll live forever, live as if you'll die today
Lif shrinks and expands in proportion to one's courage
Not a shred of evidence exsts in favor of the idea that life is serious
Life is a series of surprises and wouldn't be worth taking or keeping if it were not so
As long as you're going to be thinking anyway, think big
A fool utters all on their mind
Only a fool despises wisdom and instruction
Talk sense to a fool and he calls you foolish
Fools rush in where fools have been before
All, in time, does pass
A problem encountered is an opportunity granted
Acceptance is but a road to truth
Caution is never cowardice
Study the past, live in the present, prepare for the future
A superior man is modest in his speech, but exceeds in his actions
Ability will never catch up with the demand for it
Better a diamond with a flaw, than a pebble without
Silence is a true friend that never betrays
Everything has its beauty, but not everyone sees it
We become brave by doing brave acts
I have not failed, I have found 10,000 ways that do not work
Do not squander time for that is the stuff life is made of
There are two ways of spreading light: to be the candle or the mirror that relfects it
People do not fail, they stop trying
A wise man makes more opportunities than he finds
Those who cannot remember the past are condemmed to repeat it
It is best to learn as we go, not to go as we have learned
Good humor is goodness and wisdom combined
Have no fear of perfection, you will never reach it
It may be that those who do most, dream most
Somebody is always doing what somebody else said could not be done
He who has imagination without learning has wings but no feet
Reading is to the mind what exercise is to the body
Life consists not in holding good cards, but in playing well those you do hold
Patience is bitter but its fruit is sweet
Our birthdays are feathers in the broad wing of time
You were born an original, do not die a copy
The less their ability, the more their conceit
Great ability develops and reveals itself increasingly with every new assignment
It is a great ability to be able to conceal one's ability
Actions lie louder than words
Words without actions are the assassins of idealism
Only actions give life strength, only moderation gives it a charm
Strong reasons make strong actions
Never trust advice of a man in difficulties
A stong, positive self image is the best posssible preparation for success";

$quotes=explode("\n",$quotes);
return wptexturize( $quotes[ mt_rand(0, count($quotes) - 1) ] );
}


function quotes() {
	$chosen = get_quotes();
	echo "<p id='newquotes'>$chosen</p>";
}
// Now we set that function up to execute when the admin_footer action is called
add_action('admin_footer', 'quotes');

// We need some CSS to position the paragraph
function quote_css() {
	echo "
	<style type='text/css'>
	#newquotes {
		position: absolute;
		top: 5.7em;
		margin: 0;
		padding: 0;
		right: 70px;
		font-size: 12px;
	}
	</style>
	";
}

add_action('admin_head', 'quote_css');
/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'quote_load_widgets' );

/**
 * Register our widget.
 * 'Example_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function quote_load_widgets() {
	register_widget( 'Quote_Master_Widget' );
}

class Quote_Master_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Quote_Master_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'quotes', 'description' => __('Adds a random quote to the sidebar', 'quotes') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'quote-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'quote-widget', __('Quote Master Widget', 'quotes'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
	        $chosen = get_quotes();;

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

                printf( '<p>' . __('%1$s.', 'quotes') . '</p>', $chosen );
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Quotes', 'quotes') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

	<?php
	}
}

?>