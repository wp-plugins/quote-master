<?php
/*
This function installs the database, the options, as well as the initial quotes
*/
function quote_install()
{
	$quote_master_data_version = 0.1;
	$data = $quote_master_data_version;
	if ( ! get_option('quote_master_db_version'))
	{
		add_option('quote_master_db_version' , $data);
    	} 
	$data = 0;
	if ( ! get_option('quote_category'))
	{
		add_option('quote_category' , $data);
    	} 
	else 
	{
      		update_option('quote_category' , $data);
    	}
	$data = 30;
	if ( ! get_option('quote_master_reload_time'))
	{
		add_option('quote_master_reload_time' , $data);
    	} 
	else 
	{
      		update_option('quote_master_reload_time' , $data);
    	}
	$data = true;
	if ( ! get_option('show_dashboard_quotes'))
	{
		add_option('show_dashboard_quotes' , $data);
    	} 
	else 
	{
      		update_option('show_dashboard_quotes' , $data);
    	}
	if ( ! get_option('change_on_load'))
	{
		add_option('change_on_load' , $data);
    	} 
	else 
	{
      		update_option('change_on_load' , $data);
    	}
        $data = 'All, in time, does pass';
	if ( ! get_option('current_quote'))
	{
		add_option('current_quote' , $data);
    	} 
	else 
	{
      		update_option('current_quote' , $data);
    	}
        $data = time();
	if ( ! get_option('last_time'))
	{
		add_option('last_time' , $data);
    	} 
	else 
	{
      		update_option('last_time' , $data);
    	}

	global $wpdb;
	$table_name = $wpdb->prefix . "quotesmaster";

	if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) 
	{
		//Creating the table ... fresh!
		$sql = "CREATE TABLE " . $table_name . " (
			quote_id mediumint(9) NOT NULL AUTO_INCREMENT,
			quote TEXT NOT NULL,
			author VARCHAR(255),
			cate mediumint(9),
			PRIMARY KEY  (quote_id)
		);";
		$results = $wpdb->query( $sql );
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);



		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'The less their ability, the more their conceit.', 'Ahad Haam', '1')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Great ability develops and reveals itself increasingly with every new assignment.', 'Baltasar Gracian', '1')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'It is a great ability to be able to conceal ones ability.', 'None', '1')";
		$results = $wpdb->query( $insert );
	
		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Ability will never catch up with the demand for it.', 'Malcom Forbes', '1')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'We have too many high sounding words, and tew few actions that correspond with them.', 'Abigail Adams', '2')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'All human actions have one or more of these seven causes: chance, nature, compulsion, habit, reason, passion, and desire.', 'Aristotle', '2')";
		$results = $wpdb->query( $insert );
	
		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Actions lie louder than words.', 'Carolyn Wells', '2')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'The superior man is modest in his speech, but exceeds in his actions.', 'Confucius', '2')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Words without actions are the assassins of idealism.', 'Herbert Hoover', '2')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Only actions give life strength, only moderation gives it a charm.', 'Jean Paul Richter', '2')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'I have always thought the actions of men the best interpreters of their thoughts.', 'Joh Locke', '2')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Strong reasons make strong actions.', 'William Shakespeare', '2')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Never trust the advice of a man in difficulties.', 'Aesop', '3')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'It is very difficult to live among people you love and hold back from offering them advice.', 'Anne Tyler', '3')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Ask advice only of your equals.', 'Danish Proverb', '3')";
		$results = $wpdb->query( $insert );
	
		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Advice is what we ask for when we already know the answer but wish we didn't.', 'Erica Jong', '3')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Good advice is something a man gives when he is too old to set a bad example.', 'Francois de La Rochefoucauld', '3')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Never give advice unless asked.', 'German Proverb', '3')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Some people like my advice so much that they frame it upon the wall instead of using it.', 'Gordon R. Dickson', '3')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'I have found the best way to give advice to your children is to find out what they want and then advise them to do it.', 'Harry S Truman', '3')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'The only thing to do with good advice is pass it on. It is never any use to oneself.', 'Oscar Wilde', '3')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Don't try to solve serious matters in the middle of the night.', 'Philip K. Dick', '3')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Many receive advice, few profit by it.', 'Publilius Syrus', '3')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
       	    	"VALUES (NULL , 'Never take the advice of someone who has not had your kind of trouble.', 'Sidney J. Harris', '3')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'In giving advice, seek to help, not please, your friend.', 'Solon', '3')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Never advise anyone to go to war or to marry.', 'Spanish Proverb', '3')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'The deepest definition of youth is life as yet untouched by tragedy.', 'Alfred North Whitehead', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'You can only perceive real beauty in a person as they get older.', 'Anouk Aimee', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Young people are in a condition like permanent intoxication, because youth is sweet and they are growing.', 'Aristotle', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Beware of the young doctor and the old barber.', 'Benjamin Franklin', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'To me, old age is always 15 years older than I am.', 'Bernard M. Baruch', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'There is no old age. There is, as there always was, just you.', 'Carol Matthau', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Always be nice to those younger than you, because they are the ones who will be writing about you.', 'Cyril Connolly', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'The surprising thing about young fools is how many survive to become old fools.', 'Doug Larson', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'It is a sadness of growing older that we lose our ardent appreciation of what is new and different and difficult.', 'Elizabeth Aston', '4')";
		$results = $wpdb->query( $insert );


		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'With age come the inner, the higher life. Who would be forever young, to dwell always in externals?', 'Elizabeth Cady Stanton', '4')";
		$results = $wpdb->query( $insert );


		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Though it sounds absurd, it is true to say I felt younger at sixty than I felt at twenty.', 'Ellen Glasgow', '4')";
		$results = $wpdb->query( $insert );


		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'I grow more intense as I age.', 'Florida Scott-Maxwell', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'The longer I live the more beautiful life becomes.', 'Frank Lloyd Wright', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'I was always taught to respect my elders and I've now reached the age when I don't have anybody to respect.', 'George Burns', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Before you contradict an old man, my fair friend, you should endeavor to understand him.', 'George Santayana', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'About the only thing that comes to us without effort is old age.', 'Gloria Pitzer', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Age is not a particularly interesting subject. Anyone can get old. All you have to do is live long enough.', 'Groucho Marx', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'The older I grow the more I distrust the familiar doctrine that age brings wisdom.', 'H. L. Mencken', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'A young man is embarrassed to question an older one.', 'Homer', '4')";
		$results = $wpdb->query( $insert );


		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'I didn't mind getting old when I was young. It's the being old now that's getting to me.', 'John Scalzi', '4')";
		$results = $wpdb->query( $insert );


		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'I never feel age...If you have creative work, you don't have age or time.', 'Louise Nevelson', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'The secret of staying young is to live honestly, eat slowly, and lie about your age.', 'Lucille Ball ', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'No matter how old you are, there's always something good to look forward to.', 'Lynn Johnston', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'You're never too old to become younger.', 'Mae West', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Young people have an almost biological destiny to be hopeful.', 'Marshall Ganz', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Old age is not so bad when you consider the alternatives.', 'Maurice Chevalier', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'You don't stop laughing because you grow old. You grow old because you stop laughing.', 'Michael Pritchard', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Age is…wisdom, if one has lived one's life properly.', 'Miriam Makeba', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'Middle age is when you've met so many people that every new person you meet reminds you of someone else.', 'Ogden Nash', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'A person is always startled when he hears himself seriously called an old man for the first time.', 'Oliver Wendell Holmes', '4')";
		$results = $wpdb->query( $insert );


		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'To be 70 years young is sometimes far more cheerful and hopeful than to be 40 years old.', 'Oliver Wendell Holmes ', '4')";
		$results = $wpdb->query( $insert );


		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'I am not young enough to know everything.', 'Oscar Wilde', '4')";
		$results = $wpdb->query( $insert );


		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'To get back my youth I would do anything in the world, except take exercise, get up early, or be respectable.', 'Oscar Wilde', '4')";
		$results = $wpdb->query( $insert );


		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'I am an old man, but in many senses a very young man. And this is what I want you to be, young, young all your life.', 'Pablo Casals', '4')";
		$results = $wpdb->query( $insert );


		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'As we grow old…the beauty steals inward.', 'Ralph Waldo Emerson', '4')";
		$results = $wpdb->query( $insert );


		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'People age even when you're not looking.', 'Randy K. Milholland', '4')";
		$results = $wpdb->query( $insert );


		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'As for me, except for an occasional heart attack, I feel as young as I ever did.', 'Robert Benchley', '4')";
		$results = $wpdb->query( $insert );


		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'The heads of strong old age are beautiful beyond all grace of youth.', 'Robinson Jeffers', '4')";
		$results = $wpdb->query( $insert );


		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'People who say you're just as old as you feel are all wrong, fortunately.', 'Russell Baker', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'The young have aspirations that never come to pass, the old have reminiscences of what never happened.', 'Saki ', '4')";
		$results = $wpdb->query( $insert );

		$insert = "INSERT INTO " . $table_name .
		"(quote_id, quote, author, cate) " .
           	"VALUES (NULL , 'The older I get, the more I feel almost beautiful...', 'Sharon Olds', '4')";
		$results = $wpdb->query( $insert );

	}
	elseif(get_option('quote_master_db_version') < $quote_master_data_version)
	{
		
	}
	update_option('quote_master_db_version' , $quote_master_data_version);

}

function quote_deactivate()
{
	delete_option('show_dashboard_quotes');
	delete_option('change_on_load');
	delete_option('current_quote');
	delete_option('last_time');
	delete_option('quote_category');
	delete_option('quote_master_reload_time');
}

?>