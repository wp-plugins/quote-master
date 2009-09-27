<?php
/*
Plugin Name: Quote Master
Plugin URI: http://webdesign.vasculus.com/?page_id=43
Description: This adds a widget that displays random quotes as well as features new easy to use shortcode: [quotemaster] for your posts.  Also, this has the option to add random quotes to the admin dashboard.  Use option menu to configure.  
Author: Frank Corso
Version: 3.9.3
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

register_activation_hook( __FILE__, 'quote_install');
register_deactivation_hook( __FILE__, 'quote_deactivate');


function quote_install()
{
	$data = 1;
	if ( ! get_option('quote_language'))
	{
		add_option('quote_language' , $data);
    	} 
	else 
	{
      		update_option('quote_language' , $data);
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
}

function quote_deactivate()
{
	delete_option('show_dashboard_quotes');
	delete_option('change_on_load');
	delete_option('current_quote');
	delete_option('last_time');
	delete_option('quote_language');
	delete_option('quote_master_reload_time');
}


///Add more quotes here

function get_quotes() 
{

if ( get_option('quote_language')==1)
{
$quotes="Success is how high you bounce when you hit bottom.
Success is never final.
Success is the ability to go from failure to failure without losing your enthusiasm.
Success isn't the result of a spontaneous combustion, you must set yourself on fire.
Try not to become a man of success but rather to become a man of value.
Life isn't a matter of milestones, but of moments.
A wise man can see more from the bottom of a well than a fool can from a mountain top.
Think it more satisfactory to live richly than to die rich.
We make a living by what we get, but we make a life by what we give.
He who knows nothing, doubts nothing.
He who knows most knows best how little he knows.
Relinquishing power can be the most powerful thing that can be done.
Never trouble trouble till trouble troubles you.
A journey of a thousand miles begins with a single step.
People with goals succeed because they know where they're going.
It is never to late to be what you might have been.
Luck is a matter of preparation meeting opportunity.
The wisest mind has something yet to learn.
Science is organized knowledge. Wisdom is organized life.
Life consists not in holding good cards, but in playing well those you do hold.
Somebody is always doing what someone else said couldn't be done.
The greatest obstacle to discovery is not ignorance - it is the illusion of knowledge.
To acquire knowledge, one must study; but to acquire wisdom, one must observe.
Wisdom outweighs any wealth.
Dream as if you'll live forever, live as if you'll die today.
Life shrinks and expands in proportion to one's courage.
Not a shred of evidence exists in favor of the idea that life is serious.
Life is a series of surprises and wouldn't be worth taking or keeping if it were not so.
As long as you're going to be thinking anyway, think big.
A fool utters all on their mind.
Only a fool despises wisdom and instruction.
Talk sense to a fool and he calls you foolish.
Fools rush in where fools have been before.
All, in time, does pass.
A problem encountered is an opportunity granted.
Acceptance is but a road to truth.
Caution is never cowardice.
Study the past, live in the present, prepare for the future.
A superior man is modest in his speech, but exceeds in his actions.
Ability will never catch up with the demand for it.
Better a diamond with a flaw, than a pebble without.
Silence is a true friend that never betrays.
Everything has its beauty, but not everyone sees it.
We become brave by doing brave acts.
I have not failed, I have found 10,000 ways that do not work.
Do not squander time for that is the stuff life is made of.
There are two ways of spreading light: to be the candle or the mirror that reflects it.
People do not fail, they stop trying.
A wise man makes more opportunities than he finds.
Those who cannot remember the past are condemned to repeat it.
It is best to learn as we go, not to go as we have learned.
Good humor is goodness and wisdom combined.
Have no fear of perfection, you will never reach it.
It may be that those who do most, dream most.
Somebody is always doing what somebody else said could not be done.
He who has imagination without learning has wings but no feet.
Reading is to the mind what exercise is to the body.
Life consists not in holding good cards, but in playing well those you do hold.
Patience is bitter but its fruit is sweet.
Our birthdays are feathers in the broad wing of time.
You were born an original, do not die a copy.
The less their ability, the more their conceit.
Great ability develops and reveals itself increasingly with every new assignment.
It is a great ability to be able to conceal one's ability.
Actions lie louder than words.
Words without actions are the assassins of idealism.
Only actions give life strength, only moderation gives it a charm.
Strong reasons make strong actions.
Never trust advice of a man in difficulties.
Ask advice only of your equals.
Advice is what we ask for when we already know the answer but wish we did not.
Never give advice unless asked.
Many receive advice, few profit by it.
Never take the advice of someone who has not had your kind of trouble.
In giving advice, seek to help, not please, your friend.
To me, old age is always 15 years older than I am.
Aging is not lost youth but a new stage of opportunity and strength.
The surprising thing about young fools is how many survive to become old fools.
The longer I live the more beautiful life becomes.
About the only thing that comes to us without effort is old age.
You do not stop laughing because you grow old, you grow old because you stop laughing.
The words that enlighten the soul are more precious than jewels.
Order is the shape upon which beauty depends.
What you do, the way you think, make you beautiful.
Man is what he believes.
The public will believe anything, so long as it is not founded on truth.
With most men, unbelief in one thing springs from blind belief in another.
I would rather have a mind opened by wonder than one closed by belief.
I never cease being dumbfounded by the unbelievable things people believe.
Remember that what you believe will depend very much on what you are.
Those who can make you believe absurdities can make you commit atrocities.
Safeguard the health both of body and soul.
He who loves the world as his body may be entrusted with the empire.
It is choice, not chance, that determines your destiny.
Only I can change my life.  No one can do it for me.
Things do not change, we change.
Personality can open doors, but only character can keep them open.
When the character of a man is not clear to you, look at his friends.
One can acquire everything in solitude, except character.
The character of a man is known from his conversations.
Put more trust in nobility of character than in an oath.
Too many have dispensed with generosity in order to practice charity.
Charity sees the need not the cause.
In charity there is no excess.
Charm is a way of getting the answer yes without asking a clear question.
Charm is the quality in others that makes us more satisfied with ourselves.
Human beings are the only creatures that allow their children to come back home.
If you can give your son or daughter only one gift, let it be enthusiasm.
If your parents never had children, chances are you will not either.
Civilization degrades the many to exalt the few.
It is better for civilization to be going down the drain that to be coming up it.
Civilization is a method of living, an attitude of equal respect for all men.
Civilization begins with order, grows with liberty, and dies with chaos.
Stupid is forever, ignorance can be fixed.
Every improvement in communication makes the bore more terrible.
Think like a wise man but communicate in the language of the people.
Incompetents invariably make trouble for people other than themselves.
Equal opportunity means everyone will have a fair chance at being incompetent.
Everyone rises to their level of incompetence.
Concentration comes out of a combination of confidence and hunger.
The man who has confidence in himself gains the confidence of others.
All you need in this life is ignorance and confidence, then success is sure.
If I have lost confidence in myself, I have the universe against me.
Self-confidence is the first requisite to great undertakings.
Courage is the price that life exacts for granting peace.
Live as brave men, and if fortune is adverse, front its blow with brave hearts.
Courage is the ladder on which all the other virtues mount.
Courage is the art of being the only one who knows you are scared to death.
Courage is resistance to fear, mastery of fear - not absence of fear.
The secret to creativity is knowing how to hide your sources.
Frugality without creativity is deprivation.
Humanity can be quite cold to those whose eyes see the world differently.
To live a creative life, we must lose our fear of being wrong.
Every child is an artist.  The problem is how to remain an artist once he grows up.
The cure for boredom is curiosity, there is no cure for curiosity.
The more alternatives, the more difficult the choice.
It is our choices that show what we truly are, far more than our abilities.
A weak man has doubts before a decision, a strong man has them afterwards.
Give no decision till both sides thoust heard.
We must give lengthy deliberation to what has to be decided once and for all.
Victory attained by violence is tantamount to a defeat, for it is momentary.
There are some defeats more triumphant than victories.
When defeat is inevitable, it is wisest to yield.
Be careful that victories do not carry the seed of future defeats.
A good man would prefer to be defeated than to defeat injustice by evil means.
What is defeat? Nothing but education; nothing but the first step to something better.
The wise man will love; all others will desire.
Again, men in general desire the good, and not merely what their fathers had.
I count him braver who overcomes his desires than him who overcomes his enemies.
Dignity consists not in possessing honors, but in the consciousness that we deserve them.
Where is there dignity unless there is honesty?
Dignity and love do not blend well, nor do they continue long together.
Let not a man guard his dignity, but let his dignity guard him.
A discovery is said to be an accident meeting a prepared mind.
The more original a discovery, the more obvious it seems afterwards.
The beginning of knowledge is the discovery of something we do not understand.
The greatest obstacle to discovery is not ignorance, it is the illusion of knowledge.
Mistakes are the portals of discovery.
He who never made a mistake never made a discovery.
A mind troubled by doubt cannot focurs on the course to victory.
Doubt whom you will, but never yourself.
Just think of the tragedy of teaching children not to doubt.
To have doubted ones own first principles is the mark of a civilized man.
Beliefs are what divide people.  Doubt unites them.
A strong, positive self image is the best possible preparation for success.";}
elseif ( get_option('quote_language')==2)
{
$quotes="El �xito es tan alto que se rebota despu�s de tocar fondo 
 El �xito nunca es definitivo 
 El �xito es la capacidad de ir de fracaso en fracaso sin perder el entusiasmo 
 El �xito no es el resultado de una combusti�n espont�nea, se debe establecer a s� mismo en el fuego 
 Trate de no convertirse en un hombre de �xito, sino m�s bien a convertirse en un hombre de valor 
 La vida no es una cuesti�n de puntos de referencia, sino de los momentos 
 Un hombre sabio puede ver m�s del fondo de un pozo que a un tonto puede desde una cima de la monta�a 
 Creo que m�s satisfactorio para vivir de forma enriquecedora que morir rico 
 Hacemos una vida por lo que conseguimos, pero hacemos una vida por lo que damos 
 El que no sabe nada, nada de dudas 
 El que sabe que la mayor�a sabe mejor lo poco que sabe 
 Abandonar el poder puede ser la cosa m�s poderosa que se puede hacer 
 Nunca Trouble hasta problemas problemas que 
 Un viaje de mil millas comienza con un solo paso 
 Las personas con los objetivos de �xito, porque saben a d�nde van 
 Nunca es demasiado tarde para ser lo que pudo haber sido 
 La suerte es una cuesti�n de oportunidad de la preparaci�n de la reuni�n 
 El m�s sabio mente tiene algo que aprender 
 La ciencia es conocimiento organizado. La sabidur�a se organiza la vida 
 La vida no consiste en mantener buenas cartas, sino en jugar bien los que est�n en posesi�n de 
 Alguien siempre est� haciendo lo que alguien dijo que no pod�a hacerse 
 El mayor obst�culo para el descubrimiento no es la ignorancia - es la ilusi�n de conocimiento 
 Para adquirir conocimientos, hay que estudiar, pero para adquirir sabidur�a, hay que observar 
 La sabidur�a es mayor que cualquier riqueza 
 Sue�o como si fueras a vivir para siempre, vive como si fueras a morir hoy 
 La vida se contrae y se expande en proporci�n al valor de 
 Ni una pizca de evidencia que existe a favor de la idea de que la vida es grave 
 La vida es una serie de sorpresas y no ser�a digno de tomar o mantener si no fuera as� 
 Mientras usted va a estar pensando en cualquier caso, pensar en grande 
 Un pronuncia enga�ar a todo en su mente 
 S�lo un necio desprecia la sabidur�a y la ense�anza 
 Hable con un sentido de tonto y te llama tonta 
 Fools Rush In, donde los tontos han sido antes de 
 Todos, en el tiempo, pasa 
 Un problema que surge es una oportunidad concedida 
 La aceptaci�n no es sino un camino a la verdad 
 Precauci�n no es cobard�a 
 Estudiar el pasado, vivir en el presente, preparar el futuro 
 Un hombre superior es modesto en su discurso, pero excede en sus acciones 
 Nunca la capacidad de ponerse al d�a con la demanda del mismo 
 M�s vale un diamante con un defecto, que una piedra sin que 
 El silencio es un verdadero amigo que nunca traiciona 
 Todo tiene su belleza, pero no todos lo ven 
 Nos volvemos valientes al hacer actos valientes 
 No he fracasado, he encontrado 10.000 maneras que no funcionan 
 No desperdiciar el tiempo no para que la vida est� hecha de material 
 Hay dos formas de propagaci�n de la luz: ser la vela o el espejo que la refleja 
 La gente no fallan, que dejar de intentar 
 Un hombre sabio tiene m�s oportunidades que �l encuentra 
 Aquellos que no pueden recordar el pasado est�n condenados a repetirlo 
 Es mejor aprender a medida que avanzamos, no ir como hemos aprendido 
 Buen humor es bondad y sabidur�a combinada 
 No tengas miedo de la perfecci�n, nunca llegar a �l 
 Puede ser que los que hacen la mayor�a, el sue�o de la mayor�a de los 
 Alguien siempre est� haciendo lo que alguien dijo que no pod�a hacerse 
 El que tiene imaginaci�n sin aprender tiene alas, pero no tiene pies 
 La lectura es para la mente lo que el ejercicio es para el cuerpo 
 La vida no consiste en mantener buenas cartas, sino en jugar bien los que est�n en posesi�n de 
 La paciencia es amarga pero su fruto es dulce 
 Nuestros cumplea�os son plumas en el ala ancha de tiempo 
 Usted naci� original, no te mueras de una copia 
 Cuanto menos su capacidad, m�s su engreimiento 
 Gran capacidad se desarrolla y se revela cada vez m�s con cada nueva misi�n 
 Se trata de una gran habilidad para ser capaz de ocultar la propia capacidad 
 Las acciones se encuentran m�s que las palabras 
 Las palabras sin acciones son los asesinos del idealismo 
 S�lo las acciones dan fuerza de vida, s�lo la moderaci�n le da un encanto 
 Fuertes razones hacen fuertes acciones 
 Nunca asesoramiento de confianza de un hombre en dificultades 
 Pida consejo s�lo de sus iguales 
 Asesoramiento es lo que pedimos cuando ya sabemos la respuesta, pero desear�a que no se 
 Nunca le d� consejos a menos que le pregunt� 
 Muchos reciben asesoramiento, sin fines de lucro de unos pocos que 
 Nunca tome el consejo de alguien que no ha tenido su tipo de problema 
 Al dar asesoramiento, tratan de ayudar, no por favor, tu amigo 
 Para m�, la vejez es siempre 15 a�os mayor que yo, 
 El envejecimiento no se ha perdido la juventud, pero una nueva etapa de oportunidades y de la fuerza 
 Lo sorprendente de j�venes tontos es cu�ntos sobreviven para convertirse en idiotas 
 Cuanto m�s vivo la vida m�s hermosa se convierte en 
 Sobre la �nica cosa que nos llega sin esfuerzo es la vejez 
 Usted no parar de re�r porque seas viejo, te haces viejo, ya que parar de re�r 
 Las palabras que iluminan el alma son m�s preciosas que las joyas 
 Orden es la forma en que la belleza depende de 
 Lo que hace, la manera de pensar, te hacen bella 
 El hombre es lo que cree que 
 El p�blico creer� cualquier cosa, siempre y cuando no se funda en la verdad 
 Con la mayor�a de los hombres, la incredulidad en una cosa nace de la creencia ciega en otro 
 Prefiero tener una mente abierta por el asombro de un cerrado por la creencia de 
 Nunca deja de ser confundido por el pueblo incre�ble las cosas creen 
 Recuerde que lo que usted cree que depender� mucho de lo que se 
 Aquellos que pueden hacerte creer absurdidades pueden hacerte cometer atrocidades 
 Salvaguardar la salud de cuerpo y alma 
 El que ama el mundo como su cuerpo puede ser confiada con el imperio 
 Se trata de la elecci�n, no por azar, lo que determina tu destino 
 S�lo yo puedo cambiar mi vida. Nadie puede hacerlo por m� 
 Las cosas no cambian, cambiamos 
 La personalidad puede abrir las puertas, pero solo personaje puede mantenerlos abiertos 
 Cuando el car�cter de un hombre no est� claro para usted, mire a sus amigos 
 Se puede adquirir todo lo que en la soledad, a excepci�n de car�cter 
 El car�cter de un hombre es conocido por sus conversaciones 
 Ponga m�s confianza en la nobleza de car�cter que en un juramento 
 Demasiados han dispensado con generosidad a fin de practicar la caridad 
 La caridad no ve la necesidad de la causa de 
 En la caridad no hay excesos 
 El encanto es una manera de obtener la respuesta s�, sin hacer una pregunta clara 
 El encanto es la calidad en los dem�s que nos hace m�s satisfechos con nosotros mismos 
 Los seres humanos son las �nicas criaturas que permiten a sus hijos a volver a casa. 
 Si usted puede darle a su hijo o hija s�lo una cosa, que sea el entusiasmo 
 Si sus padres nunca tuvieron hijos, es probable que usted no sea 
 Degrada la civilizaci�n muchos de exaltar los pocos 
 Es mejor para la civilizaci�n que se va por el desag�e que viene a ser hasta que 
 La civilizaci�n es un m�todo de vida, una actitud de respeto de la igualdad para todos los hombres 
 La civilizaci�n comienza con la orden, crece con la libertad, y muere con el caos 
 Est�pido es para siempre, la ignorancia puede ser fijo 
 Toda mejora en la comunicaci�n hace que el agujero m�s terrible 
 Piensa como un hombre sabio, pero comunicarse en la lengua de la gente 
 Incompetentes invariablemente crear problemas para los dem�s que a s� mismos 
 Igualdad de oportunidades significa que todos tengan una oportunidad justa de ser incompetente 
 Todo el mundo se eleva a su nivel de incompetencia 
 Concentraci�n sale de una combinaci�n de confianza y el hambre 
 El hombre que tiene confianza en s� mismo, gana la confianza de los dem�s 
 Todo lo que necesita en esta vida es la ignorancia y la confianza, entonces el �xito es seguro 
 Si he perdido la confianza en m� mismo, tengo el universo en mi contra 
 Confianza en s� mismo es el primer requisito para las grandes empresas 
 El valor es el precio que se cobra la vida para la concesi�n de la paz 
 Vivir como hombres valientes, y si la fortuna es adversa, frente a su golpe con el coraz�n valiente 
 El valor es la escalera en la que todas las dem�s virtudes de montaje 
 El valor es el arte de ser el �nico que sabe que est� muerto de miedo 
 El valor es resistencia al miedo, el dominio del miedo - no ausencia del miedo 
 El secreto de la creatividad es saber esconder tus fuentes 
 Frugalidad sin creatividad es la privaci�n 
 La humanidad puede ser muy fr�o para aquellos cuyos ojos ven el mundo de manera diferente 
 Para vivir una vida creativa, debemos perder el miedo a equivocarse 
 Cada ni�o es un artista. El problema es c�mo seguir siendo un artista que una vez que crece 
 La cura para el aburrimiento es la curiosidad, no hay cura para la curiosidad 
 El m�s alternativas, m�s dif�cil ser� la elecci�n 
 Es nuestra elecci�n que muestran lo que realmente somos, mucho m�s que nuestras habilidades 
 Un hombre d�bil tiene dudas antes de una decisi�n, un hombre fuerte las tiene despu�s 
 Dar ninguna decisi�n hasta que ambos lados thoust o�do 
 Tenemos que dar una larga deliberaci�n a lo que tiene que decidir de una vez por todas 
 La victoria alcanzada por la violencia es equivalente a una derrota, ya que es moment�nea 
 Hay algunas derrotas m�s triunfantes que victorias 
 Cuando la derrota es inevitable, es m�s prudente ceder 
 Tenga cuidado de que las victorias no llevan la semilla de futuras derrotas 
 Un buen hombre preferir�a ser derrotado que para derrotar la injusticia por medio del mal 
 �Qu� es la derrota? Nada m�s que la educaci�n, nada m�s que el primer paso a algo mejor 
 El hombre sabio amor, le deseo todos los dem�s 
 Una vez m�s, los hombres en el deseo general de la buena, y no s�lo lo que sus padres hab�an 
 Cuento lo m�s valiente que supera sus deseos de que venza a sus enemigos 
 La dignidad no consiste en poseer honores, sino en el La conciencia que nos merecemos 
 �D�nde hay menos que la dignidad es la honestidad? 
 La dignidad y el amor no se mezclan bien, ni seguir mucho tiempo juntos 
 �No a un guardia hombre de su dignidad, sino que dej� que su dignidad le custodian 
 Un descubrimiento se dice que es un accidente de la reuni�n una mente preparada 
 El m�s original de un descubrimiento, m�s obvio parece despu�s, 
 The beginning of knowledge is the discovery of something we do not understand 
 El mayor obst�culo para el descubrimiento no es la ignorancia, es la ilusi�n de conocimiento 
 Los errores son los umbrales del descubrimiento 
 Quien nunca ha cometido un error nunca hizo un descubrimiento 
 Una imagen fuerte y positiva de s� mismo es la mejor preparaci�n posible para el �xito ";}
elseif ( get_option('quote_language')==3)
{
$quotes="Le succ�s est � quelle hauteur vous rebondir quand on touche le fond 
 Le succ�s n'est jamais d�finitif 
 Le succ�s est la capacit� d'aller d'�chec en �chec sans perdre son enthousiasme 
 Le succ�s n'est pas le r�sultat d'une combustion spontan�e, vous devez vous mettre le feu 
 Essayez de ne pas devenir un homme de succ�s mais plut�t � devenir un homme de valeur 
 La vie n'est pas une question de jalons, mais des moments 
 Un homme sage ne peut voir plus sur le fond d'un puits d'un imb�cile peut partir d'un sommet de la montagne 
 Pense que c'est plus satisfaisant de vivre richement que de mourir riche 
 Nous gagnons notre vie avec ce que nous obtenons, mais nous faisons notre vie avec ce que nous donnons 
 Celui qui ne sait rien, ne doute de rien 
 Celui qui conna�t la plupart le sait mieux combien peu il sait 
 D'abandonner le pouvoir peut �tre la chose la plus puissante qui peut �tre fait 
 Never trouble trouble till trouble peine que vous 
 Un voyage de mille miles d�bute par une seule �tape 
 Personnes ayant des buts r�ussissent parce qu'ils savent o� ils vont 
 Il n'est jamais trop tard pour �tre ce que vous auriez pu �tre 
 La chance est une question d'opportunit� r�union de pr�paration 
 Le plus sage, l'esprit a quelque chose encore � apprendre 
 La science est organis�e de connaissances. La sagesse est la vie organis�e 
 La vie ne consiste pas � tenir de bonnes cartes, mais en jouant bien ceux que vous ne d�tenez 
 Quelqu'un fait toujours ce que quelqu'un d'autre a dit ne pouvait se faire 
 Le plus grand obstacle � la d�couverte n'est pas l'ignorance - c'est l'illusion de la connaissance 
 D'acqu�rir des connaissances, on doit �tudier, mais pour acqu�rir la sagesse, on doit observer 
 La sagesse l'emporte sur toute la richesse 
 R�ve comme si vous allez vivre �ternellement, vis comme si vous allez mourir aujourd'hui 
 La vie se r�tr�cit et se dilate en proportion de son courage 
 Pas une ombre d'une preuve existe en faveur de l'id�e que la vie est grave 
 La vie est une s�rie de surprises et ne serait pas utile de prendre ou de conserver, si ce n'�tait pas si 
 Tant que vous allez penser de toute fa�on, les choses en grand 
 Un pousse tromper tout sur leur esprit 
 Seul un fou m�prise la sagesse et l'instruction 
 Discuter du sens pour un imb�cile et il vous appelle folle 
 Fools Rush In o� les fous ont �t� avant 
 Tous, dans le temps, ne passe 
 Un probl�me rencontr� est la possibilit� accord�e 
 L'acceptation n'est qu'un chemin de la v�rit� 
 La prudence est de ne jamais la l�chet� 
 �tudier la vie, pass� dans le pr�sent, pr�parer l'avenir 
 Un homme sup�rieur est modeste dans ses discours, mais d�passe, dans ses actions 
 Capacit� ne sera jamais rattraper la demande de ce 
 Mieux vaut un diamant avec une faille, d'un caillou, sans 
 Le silence est un v�ritable ami qui ne trahit jamais 
 Toute chose a sa beaut�, mais tout le monde ne voit 
 Nous devenons courageux en faisant leurs actes de bravoure 
 Je n'ai pas �chou�, j'ai trouv� 10000 moyens qui ne fonctionnent pas 
 Ne pas gaspiller le temps pour cela est la vie est faite de commandes 
 Il ya deux fa�ons de r�pandre la lumi�re: �tre la bougie ou le miroir qui refl�te 
 Les gens ne manquent pas, ils cesser d'essayer 
 Un sage a fait plus d'occasions que il trouve 
 Ceux qui ne peuvent se souvenir du pass� sont condamn�s � le r�p�ter 
 Il est pr�f�rable d'apprendre que nous allons, de ne pas aller comme nous l'avons appris 
 La bonne humeur est la bont� et la sagesse combin�e 
 N'ayez pas peur de la perfection, vous ne pourrez jamais l'atteindre 
 Mai il possible que ceux qui font la plupart, le r�ve de la plupart des 
 Quelqu'un fait toujours ce que quelqu'un d'autre a dit ne pouvait se faire 
 Celui qui a de l'imagination sans apprendre a des ailes mais pas de pieds 
 La lecture est � l'esprit ce que l'exercice est au corps 
 La vie ne consiste pas � tenir de bonnes cartes, mais en jouant bien ceux que vous ne d�tenez 
 La patience est am�re mais son fruit est doux 
 Nos anniversaires sont des plumes dans l'aile g�n�rale du temps 
 Vous �tes n� un original, ne meurent pas une copie 
 Les moins de leur capacit�, plus leur orgueil 
 Grande capacit� se d�veloppe et se r�v�le de plus en plus � chaque nouvelle affectation 
 Il s'agit d'une grande capacit� � �tre en mesure de dissimuler sa capacit� 
 Actions se trouvent plus que les mots 
 Mots sans actions sont les assassins de l'id�alisme 
 Seules les actions donnent de la force de vie, seule la mod�ration lui donne un charme 
 De fortes raisons de faire des actions fortes 
 Jamais la confiance des conseils d'un homme en difficult� 
 Demander que des conseils de vos semblables 
 Des conseils sont ce que nous demandons lorsque nous connaissons d�j� la r�ponse, mais nous ne souhaitons pas 
 Ne jamais donner des conseils � moins que demand� 
 Beaucoup re�oivent des conseils, le r�sultat peu par celle-ci 
 Ne jamais suivre les conseils de quelqu'un qui n'a pas eu votre genre d'ennui 
 En donnant des conseils, cherchent � aider, s'il vous pla�t pas, votre ami 
 Pour moi, la vieillesse est toujours 15 ans plus �g� que moi 
 Le vieillissement n'est pas perdu jeunesse, mais une nouvelle �tape de chances et de la force 
 Ce qui est surprenant jeunes fous est de savoir combien survivent et deviennent des vieux fous 
 Plus je vis la vie devient plus belle 
 La seule chose qui nous vient sans effort, c'est la vieillesse 
 Vous ne cessez pas de rire parce que tu seras vieux, tu seras vieux, parce que vous arr�ter de rire 
 Les mots qui �clairent l'�me est plus pr�cieuse que les perles 
 Ordre est la forme sur laquelle la beaut� d�pend 
 Qu'est-ce que vous faites, votre fa�on de penser, vous faire belle 
 L'homme est ce qu'il croit 
 Le public pourra rien croire, tant qu'elle n'est pas fond�e sur la v�rit� 
 Avec la plupart des hommes, l'incroyance en une chose na�t de la croyance aveugle dans un autre 
 Je pr�f�rerais avoir un esprit ouvert par admiration, non pas un ferm� par la croyance 
 Je n'ai jamais cesser d'�tre stup�fait par les gens des choses incroyables croire 
 Rappelez-vous que ce que vous croyez d�pendra beaucoup de ce que vous 
 Ceux qui peuvent vous faire croire des absurdit�s peuvent vous faire commettre des atrocit�s 
 Pr�server la sant� de corps et d'�me 
 Celui qui aime le monde comme son corps mai �tre confi�e � l'empire 
 Elle est choix, pas le hasard qui d�termine votre destin 
 Seulement, je peux changer ma vie. Personne ne peut le faire pour moi 
 Les choses ne changent pas, nous changeons 
 Personnalit� peut ouvrir des portes, mais uniquement de caract�res peut les garder ouverts 
 Quand le caract�re d'un homme n'est pas clair pour vous, de regarder ses amis 
 On peut tout acqu�rir dans la solitude, � l'exception de caract�res 
 Le caract�re d'un homme est connu de ses conversations 
 Mettre plus de confiance dans la noblesse de caract�re que dans un serment 
 Un trop grand nombre ont renonc� � la g�n�rosit� pour pratiquer la charit� 
 La charit� ne voit pas la n�cessit� de la cause 
 Dans la charit�, il n'y a pas d'exc�s 
 Le charme est une mani�re de s'entendre r�pondre oui sans poser une question claire 
 Le charme est la qualit� dans d'autres, qui nous rend plus contents de nous 
 Les �tres humains sont les seules cr�atures qui permettent � leurs enfants de revenir chez eux. 
 Si vous pouvez donner � votre fils ou votre fille unique d'un cadeau, que ce soit l'enthousiasme 
 Si vos parents n'ont jamais eu d'enfants, les chances sont que vous ne soit 
 D�grade les nombreuses civilisations pour exalter les quelques 
 Il vaut mieux pour la civilisation d'aller dans les �gouts que pour venir jusqu'� elle 
 La civilisation est un mode de vie, une attitude de respect �gal pour tous les hommes 
 La civilisation commence avec l'ordre, cro�t avec la libert�, et meurt avec le chaos 
 Stupide, c'est pour toujours, l'ignorance ne peut �tre fix�e 
 Toute am�lioration dans la communication rend l'al�sage plus terrible 
 Pensez comme un homme sage, mais de communiquer dans la langue du peuple 
 Incomp�tents font invariablement de probl�me aux personnes autres qu'eux-m�mes 
 �galit� des chances signifie tout le monde aura une vraie chance d'�tre incomp�tent 
 Tout le monde se l�ve � leur niveau d'incomp�tence 
 La concentration sort d'une combinaison de confiance et de la faim 
 L'homme qui a confiance en lui obtienne la confiance des autres 
 Tout ce qu'il faut dans cette vie, c'est l'ignorance et de confiance, alors le succ�s est s�r 
 Si j'ai perdu confiance en moi, j'ai l'univers contre moi 
 La confiance en soi est la premi�re condition pour grandes entreprises 
 Le courage est le prix qu'exige la vie pour accorder la paix 
 Vivre comme des hommes courageux, et si la fortune est d�favorable, avant son coup avec un c�ur courageux 
 Le courage est l'�chelle � laquelle toutes les autres vertus de montage 
 Le courage est l'art d'�tre la seule personne qui sait que vous �tes mort de peur 
 Le courage est la r�sistance � la peur, la ma�trise de la peur - absence non de la peur 
 Le secret de la cr�ativit� est de savoir comment cacher vos sources 
 Sans la cr�ativit�, la frugalit� est une peine privative 
 L'humanit� ne peut �tre assez froide pour ceux dont les yeux voient le monde diff�remment 
 Pour vivre une vie cr�ative, nous devons perdre notre peur de se tromper 
 Chaque enfant est un artiste. Le probl�me est de savoir comment rester un artiste une fois qu'il grandit 
 Le rem�de � l'ennui est la curiosit�, il n'existe aucun rem�de pour la curiosit� 
 Les solutions de rechange plus grand, plus difficile le choix 
 Ce sont nos choix qui montrent ce que nous sommes vraiment, beaucoup plus que nos capacit�s 
 Un homme faible a des doutes, avant une d�cision, un homme fort entre eux a ensuite 
 Ne donnent aucune d�cision jusqu'� deux c�t�s thoust entendu 
 Nous devons donner de longues d�lib�rations � ce qui doit �tre d�cid� une fois pour toutes 
 Victoire remport�e par la violence �quivaut � une d�faite, car elle est momentan�e 
 Il ya quelques d�faites plus triomphant que des victoires 
 Lorsque la d�faite est in�vitable, il est plus sage de c�der 
 Veillez � ce que les victoires ne portent pas le germe de futures d�faites 
 Un brave homme pr�f�rerait �tre vaincu que de vaincre l'injustice par des moyens mal 
 Quelle est la d�faite? Rien que l'�ducation, rien que la premi�re �tape vers quelque chose de mieux 
 L'homme sage aimera; tous les autres voudront 
 Encore une fois, les hommes de la bonne volont� g�n�rale, et non pas simplement ce que leurs p�res avaient 
 Je compte lui courageux qui surmonte ses d�sirs que celui qui vainc ses ennemis 
 La dignit� ne consiste pas � poss�der des honneurs, mais dans la CONSCIENCE m�ritent que nous les 
 O� est la dignit� moins qu'il y ait l'honn�tet�? 
 Dignit� et l'amour ne se m�langent pas bien, pas plus qu'ils ne continuent longtemps ensemble 
 Laissez pas un gardien de l'homme sa dignit�, mais je lui garde sa dignit� 
 Une d�couverte est d�clar� comme un accident une r�union des esprits pr�par�s 
 Le plus original d'une d�couverte, plus il semble �vident apr�s 
 Le d�but de la connaissance est la d�couverte de quelque chose que nous ne comprenons pas 
 Le plus grand obstacle � la d�couverte n'est pas l'ignorance, c'est l'illusion de la connaissance 
 Les erreurs sont les portails de la d�couverte 
 Lui qui n'avait jamais fait une erreur n'a jamais fait une d�couverte 
 Une forte image de soi positive est la meilleure pr�paration possible pour le succ�s";}

///Chooses a random quote by dividing the variable by line
$quotes=explode("\n",$quotes);
if ( get_option('change_on_load'))
{
return wptexturize( $quotes[ mt_rand(0, count($quotes) - 1) ] );
}
elseif ( get_option('last_time') < time() - (get_option('quote_master_reload_time') * 60))
{
$numbers = time();
update_option('last_time' , $numbers);
$data = wptexturize( $quotes[ mt_rand(0, count($quotes) - 1) ] );
update_option('current_quote',$data);
return $data;
}
else
{
$data = get_option('current_quote');
return $data;
}
}


///Creates the quote for the dashboard
function quotes() {
	$chosen = get_quotes();
	if ( get_option('show_dashboard_quotes') )
	{
		echo "<p id='newquotes'>$chosen</p>";
	}
	else
	{
		echo "<p id='newquotes'></p>";
	}
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
		right: 5px;
		font-size: 12px;
	}
	</style>
	";
}

///Sets the position for the quote
add_action('admin_head', 'quote_css');

add_action('admin_menu', 'Quote_Master_Menu');

function Quote_Master_Menu() {
  add_options_page('Quote Master Options', 'Quote Master', 8, 'the_quote_master', 'quote_master_options');
}

function quote_master_options() {
?>
  <div class="wrap">
<h2>Quote Master</h2>
<br />

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>

<p>To turn off the dashboard quotes, uncheck the first box.  If you would rather the quote change in a certain amount of time rather than every time the page is loaded, uncheck the second box.  If you uncheck this setting, enter in the amount of minutes to the next change in the third setting.  <?php /*Lastly, if you want the quotes in a different language, change the fourth option. */ ?></p>

<table class="wide" style="text-align: left; white-space: nowrap;">
<thead>

<tr valign="top">
<th class="check-column">Show Quotes in Dashboard</th>
<td>
<input name="show_dashboard_quotes" id="show_dashboard_quotes" type="checkbox" value="1" <?php checked('1', get_option('show_dashboard_quotes')); ?> />
</td>
</tr>

<tr valign="top">
<th scope="row">Change Quote with Every Load (If this is not checked, quote will change according to setting below)</th>
<td>
<input name="change_on_load" id="change_on_load" type="checkbox" value="1" <?php checked('1', get_option('change_on_load')); ?> />
</td>
</tr>



<tr>
<th scope="row">Minutes to Reload (For daily quotes: 1440 equals 1 day)</th>
<td>
<input type="text" maxlength="6" size="10" id="quote_master_reload_time" name="quote_master_reload_time" value="<?php echo stripcslashes( get_option( 'quote_master_reload_time' ) ); ?>" />
</td>
</tr>
<!-- Will use this later
<tr>
<td>
<a class="thickbox" href="<?php get_bloginfo('wpurl') ?>/wp-admin/options-general.php?page=WordPress%20File%20Monitor&amp;display=alertDesc" title="Test" style="color:#ff0;font-weight:bold;">Click Me</a>
</td>
</tr>-->

<?php /*
<tr valign="top">
<th scope="row">Language of Quotes:</th>
<td><select name="quote_language"><?php $opt_ply = get_option('quote_language'); ?>
        <option value="1" <?php if( $opt_ply == '1'){ echo 'selected'; } ?>>English</option> 
        <option value="2" <?php if( $opt_ply == '2'){ echo 'selected'; } ?>>Spanish</option>
        <option value="3" <?php if( $opt_ply == '3'){ echo 'selected'; } ?>>French</option>
       </select>
</td>
</tr>
*/ ?>
</thead>
</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="show_dashboard_quotes,change_on_load,quote_master_reload_time,quote_language" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

<h3>Suggestions</h3>
<p>Please let me know of any suggestions you may have for future versions.  On the current plan, I will be updating for the next 11 weeks while adding a few more hundred quotes as well as three main features.  After that, I plan on no longer supporting this plugin if there is no interest in it.  If you have any other features or concepts added to this plugin, feel free to post on our <a href="http://webdesign.vasculus.com/?page_id=43">Support Forums</a>.</p>
<h3>Support</h3>
<p>If you believe that Quote Master has been useful to you and has added to the personality of your website, then please consider a donation, no matter how small.  Thank you.  Feel free to go to the <a href="http://webdesign.vasculus.com/?page_id=48">Donation Page</a>.  </p>

</form>
</div>
<?php
}






///Creates the shortcode function
function quote_shortcode($atts) {
	extract(shortcode_atts(array(
		'category' => 'no cat',
		'bar' => 'default bar',
	), $atts));
        $chosen = get_quotes();

	return "{$chosen}";
}

///And adds it to the editor
add_shortcode('quotemaster', 'quote_shortcode');



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
	        $chosen = get_quotes();

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

                printf( '<p>' . __('%1$s', 'quotes') . '</p>', $chosen );
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