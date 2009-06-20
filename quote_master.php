<?php
/*
Plugin Name: Quote Master
Plugin URI: http://webdesign.vasculus.com/?page_id=14
Description: This adds random quotes to the admin dashboard.
Author: Frank Corso
Version: 0.3.1
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

$quotes="Success is how you bunce when you hit bottom
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

?>