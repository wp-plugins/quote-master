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
$quotes="El éxito es tan alto que se rebota después de tocar fondo 
 El éxito nunca es definitivo 
 El éxito es la capacidad de ir de fracaso en fracaso sin perder el entusiasmo 
 El éxito no es el resultado de una combustión espontánea, se debe establecer a sí mismo en el fuego 
 Trate de no convertirse en un hombre de éxito, sino más bien a convertirse en un hombre de valor 
 La vida no es una cuestión de puntos de referencia, sino de los momentos 
 Un hombre sabio puede ver más del fondo de un pozo que a un tonto puede desde una cima de la montaña 
 Creo que más satisfactorio para vivir de forma enriquecedora que morir rico 
 Hacemos una vida por lo que conseguimos, pero hacemos una vida por lo que damos 
 El que no sabe nada, nada de dudas 
 El que sabe que la mayoría sabe mejor lo poco que sabe 
 Abandonar el poder puede ser la cosa más poderosa que se puede hacer 
 Nunca Trouble hasta problemas problemas que 
 Un viaje de mil millas comienza con un solo paso 
 Las personas con los objetivos de éxito, porque saben a dónde van 
 Nunca es demasiado tarde para ser lo que pudo haber sido 
 La suerte es una cuestión de oportunidad de la preparación de la reunión 
 El más sabio mente tiene algo que aprender 
 La ciencia es conocimiento organizado. La sabiduría se organiza la vida 
 La vida no consiste en mantener buenas cartas, sino en jugar bien los que estén en posesión de 
 Alguien siempre está haciendo lo que alguien dijo que no podía hacerse 
 El mayor obstáculo para el descubrimiento no es la ignorancia - es la ilusión de conocimiento 
 Para adquirir conocimientos, hay que estudiar, pero para adquirir sabiduría, hay que observar 
 La sabiduría es mayor que cualquier riqueza 
 Sueño como si fueras a vivir para siempre, vive como si fueras a morir hoy 
 La vida se contrae y se expande en proporción al valor de 
 Ni una pizca de evidencia que existe a favor de la idea de que la vida es grave 
 La vida es una serie de sorpresas y no sería digno de tomar o mantener si no fuera así 
 Mientras usted va a estar pensando en cualquier caso, pensar en grande 
 Un pronuncia engañar a todo en su mente 
 Sólo un necio desprecia la sabiduría y la enseñanza 
 Hable con un sentido de tonto y te llama tonta 
 Fools Rush In, donde los tontos han sido antes de 
 Todos, en el tiempo, pasa 
 Un problema que surge es una oportunidad concedida 
 La aceptación no es sino un camino a la verdad 
 Precaución no es cobardía 
 Estudiar el pasado, vivir en el presente, preparar el futuro 
 Un hombre superior es modesto en su discurso, pero excede en sus acciones 
 Nunca la capacidad de ponerse al día con la demanda del mismo 
 Más vale un diamante con un defecto, que una piedra sin que 
 El silencio es un verdadero amigo que nunca traiciona 
 Todo tiene su belleza, pero no todos lo ven 
 Nos volvemos valientes al hacer actos valientes 
 No he fracasado, he encontrado 10.000 maneras que no funcionan 
 No desperdiciar el tiempo no para que la vida está hecha de material 
 Hay dos formas de propagación de la luz: ser la vela o el espejo que la refleja 
 La gente no fallan, que dejar de intentar 
 Un hombre sabio tiene más oportunidades que él encuentra 
 Aquellos que no pueden recordar el pasado están condenados a repetirlo 
 Es mejor aprender a medida que avanzamos, no ir como hemos aprendido 
 Buen humor es bondad y sabiduría combinada 
 No tengas miedo de la perfección, nunca llegar a él 
 Puede ser que los que hacen la mayoría, el sueño de la mayoría de los 
 Alguien siempre está haciendo lo que alguien dijo que no podía hacerse 
 El que tiene imaginación sin aprender tiene alas, pero no tiene pies 
 La lectura es para la mente lo que el ejercicio es para el cuerpo 
 La vida no consiste en mantener buenas cartas, sino en jugar bien los que estén en posesión de 
 La paciencia es amarga pero su fruto es dulce 
 Nuestros cumpleaños son plumas en el ala ancha de tiempo 
 Usted nació original, no te mueras de una copia 
 Cuanto menos su capacidad, más su engreimiento 
 Gran capacidad se desarrolla y se revela cada vez más con cada nueva misión 
 Se trata de una gran habilidad para ser capaz de ocultar la propia capacidad 
 Las acciones se encuentran más que las palabras 
 Las palabras sin acciones son los asesinos del idealismo 
 Sólo las acciones dan fuerza de vida, sólo la moderación le da un encanto 
 Fuertes razones hacen fuertes acciones 
 Nunca asesoramiento de confianza de un hombre en dificultades 
 Pida consejo sólo de sus iguales 
 Asesoramiento es lo que pedimos cuando ya sabemos la respuesta, pero desearía que no se 
 Nunca le dé consejos a menos que le preguntó 
 Muchos reciben asesoramiento, sin fines de lucro de unos pocos que 
 Nunca tome el consejo de alguien que no ha tenido su tipo de problema 
 Al dar asesoramiento, tratan de ayudar, no por favor, tu amigo 
 Para mí, la vejez es siempre 15 años mayor que yo, 
 El envejecimiento no se ha perdido la juventud, pero una nueva etapa de oportunidades y de la fuerza 
 Lo sorprendente de jóvenes tontos es cuántos sobreviven para convertirse en idiotas 
 Cuanto más vivo la vida más hermosa se convierte en 
 Sobre la única cosa que nos llega sin esfuerzo es la vejez 
 Usted no parar de reír porque seas viejo, te haces viejo, ya que parar de reír 
 Las palabras que iluminan el alma son más preciosas que las joyas 
 Orden es la forma en que la belleza depende de 
 Lo que hace, la manera de pensar, te hacen bella 
 El hombre es lo que cree que 
 El público creerá cualquier cosa, siempre y cuando no se funda en la verdad 
 Con la mayoría de los hombres, la incredulidad en una cosa nace de la creencia ciega en otro 
 Prefiero tener una mente abierta por el asombro de un cerrado por la creencia de 
 Nunca deja de ser confundido por el pueblo increíble las cosas creen 
 Recuerde que lo que usted cree que dependerá mucho de lo que se 
 Aquellos que pueden hacerte creer absurdidades pueden hacerte cometer atrocidades 
 Salvaguardar la salud de cuerpo y alma 
 El que ama el mundo como su cuerpo puede ser confiada con el imperio 
 Se trata de la elección, no por azar, lo que determina tu destino 
 Sólo yo puedo cambiar mi vida. Nadie puede hacerlo por mí 
 Las cosas no cambian, cambiamos 
 La personalidad puede abrir las puertas, pero solo personaje puede mantenerlos abiertos 
 Cuando el carácter de un hombre no está claro para usted, mire a sus amigos 
 Se puede adquirir todo lo que en la soledad, a excepción de carácter 
 El carácter de un hombre es conocido por sus conversaciones 
 Ponga más confianza en la nobleza de carácter que en un juramento 
 Demasiados han dispensado con generosidad a fin de practicar la caridad 
 La caridad no ve la necesidad de la causa de 
 En la caridad no hay excesos 
 El encanto es una manera de obtener la respuesta sí, sin hacer una pregunta clara 
 El encanto es la calidad en los demás que nos hace más satisfechos con nosotros mismos 
 Los seres humanos son las únicas criaturas que permiten a sus hijos a volver a casa. 
 Si usted puede darle a su hijo o hija sólo una cosa, que sea el entusiasmo 
 Si sus padres nunca tuvieron hijos, es probable que usted no sea 
 Degrada la civilización muchos de exaltar los pocos 
 Es mejor para la civilización que se va por el desagüe que viene a ser hasta que 
 La civilización es un método de vida, una actitud de respeto de la igualdad para todos los hombres 
 La civilización comienza con la orden, crece con la libertad, y muere con el caos 
 Estúpido es para siempre, la ignorancia puede ser fijo 
 Toda mejora en la comunicación hace que el agujero más terrible 
 Piensa como un hombre sabio, pero comunicarse en la lengua de la gente 
 Incompetentes invariablemente crear problemas para los demás que a sí mismos 
 Igualdad de oportunidades significa que todos tengan una oportunidad justa de ser incompetente 
 Todo el mundo se eleva a su nivel de incompetencia 
 Concentración sale de una combinación de confianza y el hambre 
 El hombre que tiene confianza en sí mismo, gana la confianza de los demás 
 Todo lo que necesita en esta vida es la ignorancia y la confianza, entonces el éxito es seguro 
 Si he perdido la confianza en mí mismo, tengo el universo en mi contra 
 Confianza en sí mismo es el primer requisito para las grandes empresas 
 El valor es el precio que se cobra la vida para la concesión de la paz 
 Vivir como hombres valientes, y si la fortuna es adversa, frente a su golpe con el corazón valiente 
 El valor es la escalera en la que todas las demás virtudes de montaje 
 El valor es el arte de ser el único que sabe que está muerto de miedo 
 El valor es resistencia al miedo, el dominio del miedo - no ausencia del miedo 
 El secreto de la creatividad es saber esconder tus fuentes 
 Frugalidad sin creatividad es la privación 
 La humanidad puede ser muy frío para aquellos cuyos ojos ven el mundo de manera diferente 
 Para vivir una vida creativa, debemos perder el miedo a equivocarse 
 Cada niño es un artista. El problema es cómo seguir siendo un artista que una vez que crece 
 La cura para el aburrimiento es la curiosidad, no hay cura para la curiosidad 
 El más alternativas, más difícil será la elección 
 Es nuestra elección que muestran lo que realmente somos, mucho más que nuestras habilidades 
 Un hombre débil tiene dudas antes de una decisión, un hombre fuerte las tiene después 
 Dar ninguna decisión hasta que ambos lados thoust oído 
 Tenemos que dar una larga deliberación a lo que tiene que decidir de una vez por todas 
 La victoria alcanzada por la violencia es equivalente a una derrota, ya que es momentánea 
 Hay algunas derrotas más triunfantes que victorias 
 Cuando la derrota es inevitable, es más prudente ceder 
 Tenga cuidado de que las victorias no llevan la semilla de futuras derrotas 
 Un buen hombre preferiría ser derrotado que para derrotar la injusticia por medio del mal 
 ¿Qué es la derrota? Nada más que la educación, nada más que el primer paso a algo mejor 
 El hombre sabio amor, le deseo todos los demás 
 Una vez más, los hombres en el deseo general de la buena, y no sólo lo que sus padres habían 
 Cuento lo más valiente que supera sus deseos de que venza a sus enemigos 
 La dignidad no consiste en poseer honores, sino en el La conciencia que nos merecemos 
 ¿Dónde hay menos que la dignidad es la honestidad? 
 La dignidad y el amor no se mezclan bien, ni seguir mucho tiempo juntos 
 ¡No a un guardia hombre de su dignidad, sino que dejó que su dignidad le custodian 
 Un descubrimiento se dice que es un accidente de la reunión una mente preparada 
 El más original de un descubrimiento, más obvio parece después, 
 The beginning of knowledge is the discovery of something we do not understand 
 El mayor obstáculo para el descubrimiento no es la ignorancia, es la ilusión de conocimiento 
 Los errores son los umbrales del descubrimiento 
 Quien nunca ha cometido un error nunca hizo un descubrimiento 
 Una imagen fuerte y positiva de sí mismo es la mejor preparación posible para el éxito ";}
elseif ( get_option('quote_language')==3)
{
$quotes="Le succès est à quelle hauteur vous rebondir quand on touche le fond 
 Le succès n'est jamais définitif 
 Le succès est la capacité d'aller d'échec en échec sans perdre son enthousiasme 
 Le succès n'est pas le résultat d'une combustion spontanée, vous devez vous mettre le feu 
 Essayez de ne pas devenir un homme de succès mais plutôt à devenir un homme de valeur 
 La vie n'est pas une question de jalons, mais des moments 
 Un homme sage ne peut voir plus sur le fond d'un puits d'un imbécile peut partir d'un sommet de la montagne 
 Pense que c'est plus satisfaisant de vivre richement que de mourir riche 
 Nous gagnons notre vie avec ce que nous obtenons, mais nous faisons notre vie avec ce que nous donnons 
 Celui qui ne sait rien, ne doute de rien 
 Celui qui connaît la plupart le sait mieux combien peu il sait 
 D'abandonner le pouvoir peut être la chose la plus puissante qui peut être fait 
 Never trouble trouble till trouble peine que vous 
 Un voyage de mille miles débute par une seule étape 
 Personnes ayant des buts réussissent parce qu'ils savent où ils vont 
 Il n'est jamais trop tard pour être ce que vous auriez pu être 
 La chance est une question d'opportunité réunion de préparation 
 Le plus sage, l'esprit a quelque chose encore à apprendre 
 La science est organisée de connaissances. La sagesse est la vie organisée 
 La vie ne consiste pas à tenir de bonnes cartes, mais en jouant bien ceux que vous ne détenez 
 Quelqu'un fait toujours ce que quelqu'un d'autre a dit ne pouvait se faire 
 Le plus grand obstacle à la découverte n'est pas l'ignorance - c'est l'illusion de la connaissance 
 D'acquérir des connaissances, on doit étudier, mais pour acquérir la sagesse, on doit observer 
 La sagesse l'emporte sur toute la richesse 
 Rêve comme si vous allez vivre éternellement, vis comme si vous allez mourir aujourd'hui 
 La vie se rétrécit et se dilate en proportion de son courage 
 Pas une ombre d'une preuve existe en faveur de l'idée que la vie est grave 
 La vie est une série de surprises et ne serait pas utile de prendre ou de conserver, si ce n'était pas si 
 Tant que vous allez penser de toute façon, les choses en grand 
 Un pousse tromper tout sur leur esprit 
 Seul un fou méprise la sagesse et l'instruction 
 Discuter du sens pour un imbécile et il vous appelle folle 
 Fools Rush In où les fous ont été avant 
 Tous, dans le temps, ne passe 
 Un problème rencontré est la possibilité accordée 
 L'acceptation n'est qu'un chemin de la vérité 
 La prudence est de ne jamais la lâcheté 
 Étudier la vie, passé dans le présent, préparer l'avenir 
 Un homme supérieur est modeste dans ses discours, mais dépasse, dans ses actions 
 Capacité ne sera jamais rattraper la demande de ce 
 Mieux vaut un diamant avec une faille, d'un caillou, sans 
 Le silence est un véritable ami qui ne trahit jamais 
 Toute chose a sa beauté, mais tout le monde ne voit 
 Nous devenons courageux en faisant leurs actes de bravoure 
 Je n'ai pas échoué, j'ai trouvé 10000 moyens qui ne fonctionnent pas 
 Ne pas gaspiller le temps pour cela est la vie est faite de commandes 
 Il ya deux façons de répandre la lumière: être la bougie ou le miroir qui reflète 
 Les gens ne manquent pas, ils cesser d'essayer 
 Un sage a fait plus d'occasions que il trouve 
 Ceux qui ne peuvent se souvenir du passé sont condamnés à le répéter 
 Il est préférable d'apprendre que nous allons, de ne pas aller comme nous l'avons appris 
 La bonne humeur est la bonté et la sagesse combinée 
 N'ayez pas peur de la perfection, vous ne pourrez jamais l'atteindre 
 Mai il possible que ceux qui font la plupart, le rêve de la plupart des 
 Quelqu'un fait toujours ce que quelqu'un d'autre a dit ne pouvait se faire 
 Celui qui a de l'imagination sans apprendre a des ailes mais pas de pieds 
 La lecture est à l'esprit ce que l'exercice est au corps 
 La vie ne consiste pas à tenir de bonnes cartes, mais en jouant bien ceux que vous ne détenez 
 La patience est amère mais son fruit est doux 
 Nos anniversaires sont des plumes dans l'aile générale du temps 
 Vous êtes né un original, ne meurent pas une copie 
 Les moins de leur capacité, plus leur orgueil 
 Grande capacité se développe et se révèle de plus en plus à chaque nouvelle affectation 
 Il s'agit d'une grande capacité à être en mesure de dissimuler sa capacité 
 Actions se trouvent plus que les mots 
 Mots sans actions sont les assassins de l'idéalisme 
 Seules les actions donnent de la force de vie, seule la modération lui donne un charme 
 De fortes raisons de faire des actions fortes 
 Jamais la confiance des conseils d'un homme en difficulté 
 Demander que des conseils de vos semblables 
 Des conseils sont ce que nous demandons lorsque nous connaissons déjà la réponse, mais nous ne souhaitons pas 
 Ne jamais donner des conseils à moins que demandé 
 Beaucoup reçoivent des conseils, le résultat peu par celle-ci 
 Ne jamais suivre les conseils de quelqu'un qui n'a pas eu votre genre d'ennui 
 En donnant des conseils, cherchent à aider, s'il vous plaît pas, votre ami 
 Pour moi, la vieillesse est toujours 15 ans plus âgé que moi 
 Le vieillissement n'est pas perdu jeunesse, mais une nouvelle étape de chances et de la force 
 Ce qui est surprenant jeunes fous est de savoir combien survivent et deviennent des vieux fous 
 Plus je vis la vie devient plus belle 
 La seule chose qui nous vient sans effort, c'est la vieillesse 
 Vous ne cessez pas de rire parce que tu seras vieux, tu seras vieux, parce que vous arrêter de rire 
 Les mots qui éclairent l'âme est plus précieuse que les perles 
 Ordre est la forme sur laquelle la beauté dépend 
 Qu'est-ce que vous faites, votre façon de penser, vous faire belle 
 L'homme est ce qu'il croit 
 Le public pourra rien croire, tant qu'elle n'est pas fondée sur la vérité 
 Avec la plupart des hommes, l'incroyance en une chose naît de la croyance aveugle dans un autre 
 Je préférerais avoir un esprit ouvert par admiration, non pas un fermé par la croyance 
 Je n'ai jamais cesser d'être stupéfait par les gens des choses incroyables croire 
 Rappelez-vous que ce que vous croyez dépendra beaucoup de ce que vous 
 Ceux qui peuvent vous faire croire des absurdités peuvent vous faire commettre des atrocités 
 Préserver la santé de corps et d'âme 
 Celui qui aime le monde comme son corps mai être confiée à l'empire 
 Elle est choix, pas le hasard qui détermine votre destin 
 Seulement, je peux changer ma vie. Personne ne peut le faire pour moi 
 Les choses ne changent pas, nous changeons 
 Personnalité peut ouvrir des portes, mais uniquement de caractères peut les garder ouverts 
 Quand le caractère d'un homme n'est pas clair pour vous, de regarder ses amis 
 On peut tout acquérir dans la solitude, à l'exception de caractères 
 Le caractère d'un homme est connu de ses conversations 
 Mettre plus de confiance dans la noblesse de caractère que dans un serment 
 Un trop grand nombre ont renoncé à la générosité pour pratiquer la charité 
 La charité ne voit pas la nécessité de la cause 
 Dans la charité, il n'y a pas d'excès 
 Le charme est une manière de s'entendre répondre oui sans poser une question claire 
 Le charme est la qualité dans d'autres, qui nous rend plus contents de nous 
 Les êtres humains sont les seules créatures qui permettent à leurs enfants de revenir chez eux. 
 Si vous pouvez donner à votre fils ou votre fille unique d'un cadeau, que ce soit l'enthousiasme 
 Si vos parents n'ont jamais eu d'enfants, les chances sont que vous ne soit 
 Dégrade les nombreuses civilisations pour exalter les quelques 
 Il vaut mieux pour la civilisation d'aller dans les égouts que pour venir jusqu'à elle 
 La civilisation est un mode de vie, une attitude de respect égal pour tous les hommes 
 La civilisation commence avec l'ordre, croît avec la liberté, et meurt avec le chaos 
 Stupide, c'est pour toujours, l'ignorance ne peut être fixée 
 Toute amélioration dans la communication rend l'alésage plus terrible 
 Pensez comme un homme sage, mais de communiquer dans la langue du peuple 
 Incompétents font invariablement de problème aux personnes autres qu'eux-mêmes 
 Égalité des chances signifie tout le monde aura une vraie chance d'être incompétent 
 Tout le monde se lève à leur niveau d'incompétence 
 La concentration sort d'une combinaison de confiance et de la faim 
 L'homme qui a confiance en lui obtienne la confiance des autres 
 Tout ce qu'il faut dans cette vie, c'est l'ignorance et de confiance, alors le succès est sûr 
 Si j'ai perdu confiance en moi, j'ai l'univers contre moi 
 La confiance en soi est la première condition pour grandes entreprises 
 Le courage est le prix qu'exige la vie pour accorder la paix 
 Vivre comme des hommes courageux, et si la fortune est défavorable, avant son coup avec un cœur courageux 
 Le courage est l'échelle à laquelle toutes les autres vertus de montage 
 Le courage est l'art d'être la seule personne qui sait que vous êtes mort de peur 
 Le courage est la résistance à la peur, la maîtrise de la peur - absence non de la peur 
 Le secret de la créativité est de savoir comment cacher vos sources 
 Sans la créativité, la frugalité est une peine privative 
 L'humanité ne peut être assez froide pour ceux dont les yeux voient le monde différemment 
 Pour vivre une vie créative, nous devons perdre notre peur de se tromper 
 Chaque enfant est un artiste. Le problème est de savoir comment rester un artiste une fois qu'il grandit 
 Le remède à l'ennui est la curiosité, il n'existe aucun remède pour la curiosité 
 Les solutions de rechange plus grand, plus difficile le choix 
 Ce sont nos choix qui montrent ce que nous sommes vraiment, beaucoup plus que nos capacités 
 Un homme faible a des doutes, avant une décision, un homme fort entre eux a ensuite 
 Ne donnent aucune décision jusqu'à deux côtés thoust entendu 
 Nous devons donner de longues délibérations à ce qui doit être décidé une fois pour toutes 
 Victoire remportée par la violence équivaut à une défaite, car elle est momentanée 
 Il ya quelques défaites plus triomphant que des victoires 
 Lorsque la défaite est inévitable, il est plus sage de céder 
 Veillez à ce que les victoires ne portent pas le germe de futures défaites 
 Un brave homme préférerait être vaincu que de vaincre l'injustice par des moyens mal 
 Quelle est la défaite? Rien que l'éducation, rien que la première étape vers quelque chose de mieux 
 L'homme sage aimera; tous les autres voudront 
 Encore une fois, les hommes de la bonne volonté générale, et non pas simplement ce que leurs pères avaient 
 Je compte lui courageux qui surmonte ses désirs que celui qui vainc ses ennemis 
 La dignité ne consiste pas à posséder des honneurs, mais dans la CONSCIENCE méritent que nous les 
 Où est la dignité moins qu'il y ait l'honnêteté? 
 Dignité et l'amour ne se mélangent pas bien, pas plus qu'ils ne continuent longtemps ensemble 
 Laissez pas un gardien de l'homme sa dignité, mais je lui garde sa dignité 
 Une découverte est déclaré comme un accident une réunion des esprits préparés 
 Le plus original d'une découverte, plus il semble évident après 
 Le début de la connaissance est la découverte de quelque chose que nous ne comprenons pas 
 Le plus grand obstacle à la découverte n'est pas l'ignorance, c'est l'illusion de la connaissance 
 Les erreurs sont les portails de la découverte 
 Lui qui n'avait jamais fait une erreur n'a jamais fait une découverte 
 Une forte image de soi positive est la meilleure préparation possible pour le succès";}

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