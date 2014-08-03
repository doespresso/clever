<?php namespace Hailwood\Smartless4laravel\Console;

use Illuminate\Console\Command;

class SmartlessCommand extends Command{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'smartless';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Because everyone needs some motivating!';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire(){
        $quotes = array(
            "I get knocked down. But I get up again. You’re never going to keep me down.<comment> – Chumbawamba</comment>",
            "Do not wait to strike till the iron is hot; but make it hot by striking.<comment> – William B. Sprague</comment>",
            "Sometimes we are limited more by attitude than by opportunities.<comment> – Anonymous</comment>",
            "A healthy attitude is contagious but don’t wait to catch it from others. Be a carrier.<comment>- Anonymous</comment>",
            "Although fate presents the circumstances, how you react depends on your character.<comment> – Anonymous</comment>",
            "Attitude determines altitude.<comment> – Anonymous</comment>",
            "Take charge of your attitude. Don’t let someone else choose it for you.<comment> – Anonymous</comment>",
            "Attitudes are contagious. Are yours worth catching?<comment> – Anonymous</comment>",
            "People who say it cannot be done should not interrupt those who are doing it.<comment> – Anonymous</comment>",
            "Your attitude is an expression of your values,beliefs and expectations.<comment> – Brain Tracy</comment>",
            "Optimism is the one quality more associated with success and happiness than any other.<comment> – Brain Tracy</comment>",
            "If you did not care at all what anyone else thought about you, what would you do differently or change in your life?<comment> – Brain Tracy</comment>",
            "Make a game of finding something positive in every situation.Ninety-five percent of your emotions are determined by how you interpret events to yourself.<comment> – Brain Tracy</comment>",
            "Whatever is expressed is impressed. Whatever you say to yourself, with emotion, generates thoughts, ideas and behaviors consistent with those words.<comment> – Brain Tracy</comment>",
            "To hell with circumstances; I create opportunities.<comment> – Bruce Lee</comment>",
            "As you think, so shall you become.<comment> – Bruce Lee</comment>",
            "Ever since I was a child I have had this instinctive urge for expansion and growth. To me, the function and duty of a quality human being is the sincere and honest development of one’s potential.<comment> – Bruce Lee</comment>",
            "A goal is not always meant to be reached, it often serves simply as something to aim at.<comment> – Bruce Lee</comment>",
            "All fixed set patterns are incapable of adaptability or pliability. The truth is outside of all fixed patterns.<comment> – Bruce Lee</comment>",
            "Always be yourself, express yourself, have faith in yourself, do not go out and look for a successfull personality and duplicate it.<comment> – Bruce Lee</comment>",
            "I’m not in this world to live up to your expectations and you’re not in this world to live up to mine.<comment> – Bruce Lee</comment>",
            "If you always put limit on everything you do, physical or anything else. It will spread into your work and into your life. There are no limits. There are only plateaus, and you must not stay there, you must go beyond them.<comment> – Bruce Lee</comment>",
            "If you love life, don’t waste time, for time is what life is made up of.<comment> – Bruce Lee</comment>",
            "If you spend too much time thinking about a thing, you’ll never get it done.<comment> – Bruce Lee</comment>",
            "It’s not the daily increase but daily decrease. Hack away at the unessential.<comment> – Bruce Lee</comment>",
            "Knowledge will give you power, but character respect.<comment> – Bruce Lee</comment>",
            "Mistakes are always forgivable, if one has the courage to admit them.<comment> – Bruce Lee</comment>",
            "Notice that the stiffest tree is most easily cracked, while the bamboo or willow survives by bending with the wind.<comment> – Bruce Lee</comment>",
            "Real living is living for others.<comment> – Bruce Lee</comment>",
            "Take things as they are. Punch when you have to punch. Kick when you have to kick.<comment> – Bruce Lee</comment>",
            "The less effort, the faster and more powerful you will be.<comment> - Bruce Lee</comment>",
            "Happiness is not by chance, but by choice.<comment> – Jim Rohn</comment>",
            "Humans have the remarkable ability to get exactly what they must have. But there is a difference between a ‘must’ and ‘want.’<comment> – Jim Rohn</comment>",
            "Motivation alone is not enough.If you have an idiot and you motivate him,now you have a motivated idiot.<comment> – Jim Rohn</comment>",
            "My suggestion would be to walk away from the 90% who don’t and join the 10% who do.<comment> – Jim Rohn</comment>",
            "When you know what you want,and you want it badly enough,you’ll find a way to get it.<comment> – Jim Rohn</comment>",
            "Without a sense of urgency,dersire loses its value.<comment> – Jim Rohn</comment>",
            "Do not go where the path may lead, go instead where there is no path and leave a trail.<comment> – Ralph Waldo Emerson</comment>",
            "Do the thing we fear, and death of fear is certain.<comment> – Ralph Waldo Emerson</comment>",
            "A chief event of life is the day in which we have encountered a mind that startled us.<comment> – Ralph Waldo Emerson</comment>",
            "We are all inventors, each sailing out on a voyage of discovery, guided each by a private chart, of which there is no duplicate. The world is all gates, all opportunities.<comment> – Ralph Waldo Emerson</comment>",
            "A good indignation brings out all one’s powers.<comment>  – Ralph Waldo Emerson</comment>",
            "A great part of courage is the courage of having done the thing before.<comment> – Ralph Waldo Emerson</comment>",
            "A hero is no braver than an ordinary man, but he is brave five minutes longer.<comment> – Ralph Waldo Emerson</comment>",
            "A man is what he thinks about all day long.<comment> – Ralph Waldo Emerson</comment>",
            "A man’s growth is seen in the successive choirs of his friends.<comment> – Ralph Waldo Emerson</comment>",
            "Adopt the pace of nature: her secret is patience.<comment> – Ralph Waldo Emerson</comment>",
            "All life is an experiment. The more experiments you make the better.<comment> – Ralph Waldo Emerson</comment>",
            "Always do what you are afraid to do.<comment> – Ralph Waldo Emerson</comment>",
            "As long as a man stands in his own way, everything seems to be in his way.<comment> – Ralph Waldo Emerson</comment>",
            "As a cure for worrying, work is better than whiskey.<comment> – Ralph Waldo Emerson</comment>",
            "An ounce of action is worth a ton of theory.<comment> – Ralph Waldo Emerson</comment>",
            "As soon as there is life there is danger.<comment> – Ralph Waldo Emerson</comment>",
            "Beauty without expression is boring.<comment> – Ralph Waldo Emerson</comment>",
            "Before we acquire great power we must acquire wisdom to use it well.<comment> - Ralph Waldo Emerson</comment>",
            "Build a better mousetrap and the world will beat a path to your door.<comment> – Ralph Waldo Emerson</comment>",
            "Character is higher than intellect. A great soul will be strong to live as well as think.<comment> – Ralph Waldo Emerson</comment>",
            "Don’t be too timid and squeamish about your actions. All life is an experiment.<comment> – Ralph Waldo Emerson</comment>",
            "Each age, it is found, must write its own books; or rather, each generation for the next succeeding.<comment> – Ralph Waldo Emerson</comment>",
            "Enthusiasm is the mother of effort, and without it nothing great ever achieved.<comment> – Ralph Waldo Emerson</comment>",
            "Every artist was first an amateur.<comment> – Ralph Waldo Emerson</comment>",
            "Live with passion.<comment> – Tony Robbins</comment>",
            "Stay committed to your decisions, but stay flexible in your approach.<comment> – Tony Robbins quote</comment>",
            "It not knowing what to do, it’s doing what you know.<comment> – Tony Robbins</comment>",
            "Successful people ask better questions, and as a result, they get better answers.<comment> - Tony Robbins</comment>",
            "There is no such thing as failure. There are only results.<comment> – Tony Robbins</comment>",
            "If you do what you’ve always done, you’ll get what you’ve always gotten.<comment> – Tony Robbins</comment>",
            "Positive thinking won’t let you do anything but it will let you do everything better than negative thinking will.<comment> – Zig Ziglar</comment>",
            "To respond is positive, to react is negative.<comment> – Zig Ziglar</comment>",
            "Of all the ‘attitudes’ we can acquire, surely the attitude of gratitude is the most important and by far the most life-changing.<comment> – Zig Ziglar</comment>",
            "When you choose to be pleasant and positive in the way you treat others, you have also chosen, in most cases,how you are going to be treated by others.<comment> – Zig Ziglar</comment>",
            "You can disagree without being disagreeable.<comment> – Zig Ziglar</comment>",
            "I’ve go to say ‘no’ to the good to say ‘yes’ to the best.<comment> – Zig Ziglar</comment>",
            "You cannot tailor make the situations in life, but you can tailor make the attitudes to fit those situations before they arise.<comment> – Zig Ziglar</comment>",
            "Great spirits have always encountered violent opposition from mediocre minds.<comment> – Albert Einstein</comment>",
            "Try not to be a person of success, but rather a person of virtue.<comment> – Albert Einstein</comment>",
            "Change is not merely necessary to life – it is life.<comment> - Alvin Toffler</comment>",
            "How wonderful it is that nobody need wait a single moment before starting to improve the world.<comment> – Anne Frank</comment>",
            "We are what we repeatedly do. Excellence, therefore, is not an act but a habit.<comment> – Aristotle</comment>",
            "The only way of finding the limits of the possible is by going beyond them into the impossible.<comment> – Arthur C. Clarke</comment>",
            "Experience is the child of thought, and thought is the child of action.<comment> – Benjamin Disraeli</comment>",
            "Attitude is more important than the past, than education, than money, than circumstances, than what people do or say. It is more important than appearance, giftedness, or skill.<comment> – Charles Swindoll</comment>",
            "Our greatest glory is not in never falling but in rising every time we fall.<comment> – Confucius</comment>",
            "Don’t take yourself too seriously. And don’t be too serious about not taking yourself too seriously.<comment> – Howard Ogden</comment>",
            "Holding on to anger is like grasping a hot coal with the intent of throwing it at someone else; you are the one who gets burned.<comment> – Buddha</comment>",
            "Time is the coin of life. Only you can determine how it will be spent.<comment> – Carl Sandburg</comment>",
            "Eagles come in all shapes and sizes, but you will recognize them chiefly by their attitudes.<comment> – Charles Prestwich Scott</comment>",
            "To talk goodness is not good… only to do it is.<comment> – Chinese proverb</comment>",
            "Don’t put a limit on what can be accomplished.<comment> – Christopher Reeve</comment>",
            "An optimist is a person who sees a green light everywhere. The pessimist sees only the red light. But the truly wise person is color blind.<comment> – Dr. Albert Schweitzer</comment>",
            "The state of your life is nothing more than a reflection of your state of mind.<comment> – Dr. Wayne W. Dyer</comment>",
            "A great attitude does much more than turn on the lights in our worlds; it seems to magically connect us to all sorts of serendipitous opportunities that were somehow absent before the change.<comment> – Earl Nightingale</comment>",
            "Our attitude toward life determines life’s attitude towards us.<comment> – Earl Nightingale</comment>",
            "Character is the result of two things: mental attitude and the way we spend our time.<comment> – Elbert Green Hubbard</comment>",
            "Funny is an attitude.<comment> – Flip Wilson</comment>",
            "Those who cannot change their minds cannot change anything.<comment> – George Bernard Shaw</comment>",
            "Take calculated risks. That is quite different from being rash.<comment> – George S. Patton</comment>",
            "Adopting the right attitude can convert a negative stress into a positive one.<comment> – Hans Selye</comment>",
            "Keep your face to the sunshine and you cannot see the shadow.<comment> – Helen Adams Keller</comment>",
            "If you have built castles in the air, your work need not be lost. That is where they should be. Now put the foundation under them.<comment> – Henry David Thoreau</comment>",
            "When it’s time to die, let us not discover that we have never lived.<comment> -Henry David Thoreau</comment>",
            "A positive attitude may not solve all your problems, but it will annoy enough people to make it worth the effort.<comment> – Herm Albright</comment>",
            "It is not the position, but the disposition.<comment> – J. E. Dinger</comment>",
            "Knowing is not enough; we must apply. Willing is not enough; we must do.<comment> - Johann Wolfgang von Goethe</comment>",
            "Things turn out best for the people who make the best of the way things turn out.<comment> – John Wooden</comment>",
            "Words are plentiful; deeds are precious.<comment> – Lech Walesa</comment>",
            "Ability is what you’re capable of doing. Motivation determines what you do. Attitude determines how well you do it.<comment> – Lou Holtz</comment>",
            "The real voyage of discovery consists not in making new landscapes but in having new eyes.<comment> – Marcel Proust</comment>",
            "The best way to cheer yourself up: Cheer everybody else up.<comment> – Mark Twain</comment>",
            "Nothing contributes so much to tranquilize the mind as a steady purpose– a point on which the soul may fix its intellectual eye.<comment> – Mary Shelley</comment>",
            "Every man must decide whether he will walk in the light of creative altruism or in the darkness of destructive selfishness.<comment> – Martin Luther King Jr.</comment>",
            "To be a great champion you must believe you are the best. If you’re not, pretend you are.<comment> – Muhammad Ali</comment>",
            "A cynic is a man who knows the price of everything, and the value of nothing.<comment> – Oscar Wilde</comment>",
            "You can discover more about a person in an hour of play than in a year of conversation.<comment> – Plato</comment>",
            "He who hesitates is lost.<comment> – Proverb</comment>",
            "Fortune favors the brave.<comment> – Publius Terence</comment>",
            "To different minds, the same world is a hell, and a heaven.<comment> – Ralph Waldo Emerson</comment>",
            "The best way out is always through.<comment> – Robert Frost</comment>",
            "Always look at what you have left.Never look at what you have lost.<comment> – Robert H. Schuller</comment>",
            "Nothing will ever be attempted if all possible objections must first be overcome.<comment> – Samuel Johnson</comment>",
            "The first key to greatness is to be in reality what we appear to be.<comment> - Socrates</comment>",
            "Optimism means expecting the best, but confidence means knowing how to handle the worst. Never make a move if you are merely optimistic.<comment> – The Zurich Axioms</comment>",
            "Minds are like parachutes – they only function when open.<comment> – Thomas Dewar</comment>",
            ". . . Everything can be taken from a man but one thing; the last of the human freedoms—to choose one’s attitude in any given set of circumstances, to choose one’s own way.<comment> – Victor E. Frankl</comment>",
            "Work spares us from three evils: boredom, vice, and need.<comment> – Voltaire</comment>",
            "Mental attitude is more important than mental capacity.<comment> – Walter Dill Scott</comment>",
            "It’s great to be great, but its greater to be human.<comment> – Will Rogers</comment>",
            "You cannot raise a man up by calling him down.<comment> – William Boetcker</comment>",
            "Be not afraid of life. Believe that life is worth living and your belief will help create the fact.<comment> – William James</comment>",
            "The greatest discovery of my generation is that human beings can alter their lives by altering their attitudes of mind.<comment> – William James</comment>",
            "The optimist sees opportunity in every danger; the pessimist sees danger in every opportunity.<comment> – Winston Churchill</comment>",
            "We are still masters of our fate.  We are still captains of our souls.<comment> – Winston Churchill</comment>",
            "Kites rise highest against the wind; not with it.<comment> – Winston Churchill</comment>",
        );

        $quote = $quotes[array_rand($quotes)];

        $this->line('<info>Smartless4laravel:</info> ' . $quote);
    }

}