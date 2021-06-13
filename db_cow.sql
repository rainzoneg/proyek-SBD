--
-- PostgreSQL database dump
--

-- Dumped from database version 13.2
-- Dumped by pg_dump version 13.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- PostgreSQL database dump complete
--

--
-- PostgreSQL database dump
--

-- Dumped from database version 13.2
-- Dumped by pg_dump version 13.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: account_test; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.account_test (
    account_id integer NOT NULL,
    firstname text NOT NULL,
    surname text,
    email text NOT NULL,
    wallet bigint,
    password text
);


ALTER TABLE public.account_test OWNER TO postgres;

--
-- Name: account_test_account_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.account_test_account_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.account_test_account_id_seq OWNER TO postgres;

--
-- Name: account_test_account_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.account_test_account_id_seq OWNED BY public.account_test.account_id;


--
-- Name: film; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.film (
    film_id integer,
    title text,
    poster_url text,
    release_date date,
    studio text,
    genre1 text,
    genre2 text,
    genre3 text,
    rating text,
    length integer,
    description text
);


ALTER TABLE public.film OWNER TO postgres;

--
-- Name: order_data; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.order_data (
    order_id integer NOT NULL,
    account_id integer,
    film_id integer,
    amount smallint
);


ALTER TABLE public.order_data OWNER TO postgres;

--
-- Name: order_data_order_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.order_data_order_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.order_data_order_id_seq OWNER TO postgres;

--
-- Name: order_data_order_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.order_data_order_id_seq OWNED BY public.order_data.order_id;


--
-- Name: price_data; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.price_data (
    film_id integer,
    price integer
);


ALTER TABLE public.price_data OWNER TO postgres;

--
-- Name: account_test account_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.account_test ALTER COLUMN account_id SET DEFAULT nextval('public.account_test_account_id_seq'::regclass);


--
-- Name: order_data order_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_data ALTER COLUMN order_id SET DEFAULT nextval('public.order_data_order_id_seq'::regclass);


--
-- Data for Name: account_test; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.account_test (account_id, firstname, surname, email, wallet, password) FROM stdin;
1	Richard	Tanoto	richard.tanoto@yahoo.com	140000	ritan1
2	Juan	Patrick	juan.patrick@yahoo.com	200000	jupat1
3	Samuel	Nathaniel	samuel.nathaniel@yahoo.com	400000	samnath1
4	Ronald	Grant	ronald.grant@yahoo.com	500000	rogrant1
5	Richard	Patrick	richard.patrick@yahoo.com	430000	ripat1
6	Juan	Nathaniel	juan.nathaniel@yahoo.com	50000	junath1
7	Samuel	Grant	samuel.grant@yahoo.com	250000	samgrant1
8	Ronald	Tanoto	ronald.tanoto@yahoo.com	450000	rotan1
9	Richard	Nathaniel	richard.nathaniel@yahoo.com	1000000	rinath1
10	Juan	Grant	juan.grant@yahoo.com	85000	jugrant1
11	Samuel	Tanoto	samuel.tanoto@yahoo.com	275000	samtan1
12	Ronald	Patrick	ronald.patrick@yahoo.com	650000	ropat1
\.


--
-- Data for Name: film; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.film (film_id, title, poster_url, release_date, studio, genre1, genre2, genre3, rating, length, description) FROM stdin;
1	Captain America: The Winter Soldier	http://resizing.flixster.com/gxRJwetP1eNIrPR6xlWBfD_VaFc=/180x267/dkpu1ddg7pbsk.cloudfront.net/movie/11/17/72/11177246_ori.jpg	2014-04-04	Marvel Studios	Sci-Fi	Adventure	Action	PG-13	136	As Steve Rogers struggles living his role in the modern world, he teams up with fellow Avenger and S.H.I.E.L.D agent, Black Widow, to battle an assassin from history: the Winter Soldier.
2	Maleficent	http://resizing.flixster.com/YukULOFULUesVZccNjOZzF1YX30=/180x270/dkpu1ddg7pbsk.cloudfront.net/movie/11/18/12/11181292_ori.jpg	2014-05-30	Walt Disney Pictures	Family	Adventure	Action	PG	97	Maleficent, a kind-hearted yet vengeful fairy is driven to curse an infant princess, Aurora, the person who can restore peace to their troubled land.
3	Frozen	http://resizing.flixster.com/M3JgYWjuLaOPruIuhLfHA0GwmtY=/180x267/dkpu1ddg7pbsk.cloudfront.net/movie/11/17/35/11173584_ori.jpg	2013-11-27	Walt Disney Pictures	Comedy	Animation	Adventure	PG	102	Anna sets out on a journey with an iceman, Kristoff, and his reindeer to find her estranged sister, Elsa, the "witch" of ice, whose icy powers have inadvertently trapped their kingdom in eternal winter. 
4	Despicable Me 2	http://resizing.flixster.com/UFoFQEayDyhzauy9wL-1wGTuKJA=/180x257/dkpu1ddg7pbsk.cloudfront.net/movie/11/17/21/11172174_ori.jpg	2013-07-03	Universal	Family	Comedy	Animation	PG	98	Gru is recruited by the Anti-Villain League to help them fight off a new up-and-coming supervillain.
5	Monsters University	http://resizing.flixster.com/68fO9SugBdM8ljYJJ32dYp0bs7Q=/180x257/dkpu1ddg7pbsk.cloudfront.net/movie/11/16/99/11169964_ori.jpg	2013-06-21	Walt Disney Pictures	Comedy	Animation	Adventure	G	104	Arch-rivals Mike and Sulley join Monsters University in order to graduate as the scariest monsters on the planet.
6	The Amazing Spider-Man 2	http://resizing.flixster.com/uJRknhjV8s_CDr9Krj6hzk4GzYM=/180x270/dkpu1ddg7pbsk.cloudfront.net/movie/11/18/00/11180032_ori.jpg	2014-05-02	Columbia Pictures	Fantasy	Adventure	Action	PG-13	142	Spider-Man's relationship with Gwen is at stake when his childhood friend, Harry Osborn, unleashes the new supervillain Electro against them.
7	Dawn of the Planet of the Apes	https://m.media-amazon.com/images/M/MV5BMTgwODk3NDc1N15BMl5BanBnXkFtZTgwNTc1NjQwMjE@._V1_.jpg	2014-07-11	20th Century Fox	Sci-Fi	Drama	Action	PG-13	130	Ceasar, a chimpanzee and leader of the evolved apes, allows a human family into his territory. However, due to a vindictive bonobo, misunderstandings arise between the two species, resulting in war.
8	Ice Age: Continental Drift	http://resizing.flixster.com/EhgnWr8tKMra_jgh43zALuCZ9Ig=/180x270/dkpu1ddg7pbsk.cloudfront.net/movie/11/17/67/11176781_ori.jpg	2012-07-13	Fox	Comedy	Animation	Adventure	PG	88	Scrat causes a disaster when his nut chasing leads to a continental drift. Once again, Manny, Diego and Sid experience an adventure to return home.
9	Kung Fu Panda 2	http://resizing.flixster.com/dJ62KC8VCmLwVq0045kP0a0RvEE=/173x270/dkpu1ddg7pbsk.cloudfront.net/movie/11/15/66/11156693_ori.jpg	2011-05-26	Paramount	Animation	Adventure	Action	PG	91	Po takes it upon himself to stop the murderous peacock Lord Shen who intends to conquer China and destroy kung fu.
10	Guardians of the Galaxy	https://upload.wikimedia.org/wikipedia/id/7/78/Film_Guardians_of_the_Galaxy.png	2014-08-01	Marvel Studios	Sci-Fi	Adventure	Action	PG-13	121	Pursued by a radical warlord, Peter Quill and a group of extraterrestrial criminals go on the run after stealing a powerful artifact.
11	The Smurfs	http://resizing.flixster.com/s5fZNIM3cQjt9AM6y_VC3jt1syc=/180x270/dkpu1ddg7pbsk.cloudfront.net/movie/11/16/36/11163657_ori.jpg	2011-07-29	Columbia	Comedy	Animation	Adventure	PG	103	Peter escapes from the planet Morag with a valuable orb that Ronan the Accuser wants. He eventually forms a group with unwilling heroes to stop Ronan.
12	Despicable Me	http://resizing.flixster.com/VoG3m3OewOKv5t1EQbX-kwLFuAY=/180x270/dkpu1ddg7pbsk.cloudfront.net/movie/11/16/88/11168864_ori.jpg	2010-07-09	Universal	Family	Comedy	Animation	PG	95	Gru, a criminal mastermind, adopts three orphans as pawns to carry out the biggest heist in history. His life takes an unexpected turn when the little girls see him as their potential father.
13	The Hunger Games	http://resizing.flixster.com/ojHrfHgQ7Z6zwJ9O0GlmvI_Y-6Y=/180x270/dkpu1ddg7pbsk.cloudfront.net/movie/11/17/36/11173667_ori.jpg	2012-03-23	Lionsgate	Sci-Fi	Adventure	\N	PG-13	142	Katniss volunteers to replace her sister in a tournament that ends only when one participant remains. Pitted against contestants who have trained for this all their life, she has little to rely on.
14	Cars 2	http://resizing.flixster.com/2EEq8Qjx4aMkNdwlLypKTtnT1X4=/180x267/dkpu1ddg7pbsk.cloudfront.net/movie/11/15/64/11156447_ori.jpg	2011-06-24	Walt Disney Pictures	Comedy	Animation	Adventure	G	106	Star racecar Lightning McQueen and his friend Mater journey abroad to participate in a Grand Prix race. The path to the championship becomes troublesome when Mater gets involved in espionage.
15	Ice Age: Dawn of the Dinosaurs	http://resizing.flixster.com/ee9qtz-r1W0A5tmu-Q1vSj1AxvA=/180x262/dkpu1ddg7pbsk.cloudfront.net/movie/10/93/89/10938903_ori.jpg	2009-07-01	Fox	Animation	Adventure	Action	PG	94	Manny and Ellie are expecting their first child, while Diego plans to move out. Meanwhile, Sid invites trouble by stealing some dinosaur eggs, causing the others to come and save him.
16	Toy Story 3	http://resizing.flixster.com/Tv9f7mIJrCc--JvPXl60rMI3Pkw=/180x266/dkpu1ddg7pbsk.cloudfront.net/movie/11/13/43/11134356_ori.jpg	2010-06-18	Walt Disney Pictures	Comedy	Animation	Adventure	G	103	Before Andy leaves for college, his toys are mistakenly delivered to a day care centre. Woody convinces the other toys that they were not dumped and leads them on an expedition back home.
17	Spider-Man 3	http://resizing.flixster.com/QeTUzkp6yGhLMqZRwZ4ygqobQl0=/180x270/dkpu1ddg7pbsk.cloudfront.net/movie/11/16/52/11165292_ori.jpg	2007-05-04	Columbia	Adventure	Action	\N	PG-13	139	Peter Parker becomes one with a symbiotic alien that bolsters his Spider-Man avatar and affects his psyche. He also has to deal with Sandman and maintain a fragmented relationship with Mary Jane.
18	Kung Fu Panda	http://resizing.flixster.com/Xx3Kv2GPxvCvWWGe_BjJCd6mq3w=/180x270/dkpu1ddg7pbsk.cloudfront.net/movie/11/17/78/11177843_ori.jpg	2008-06-06	Paramount	Animation	Adventure	Action	PG	92	Po, a clumsy panda, is a kung fu fanatic who lives in the Valley of Peace and works in his goose father Mr. Ping's noodle shop, unable to realize his dream of learning kung fu.
19	Ratatouille	http://resizing.flixster.com/8S8STXVMHBpUANLhLeLbVcdo0QY=/180x266/dkpu1ddg7pbsk.cloudfront.net/movie/41/60/98/4160984_ori.jpg	2007-06-29	Disney	Family	Comedy	Animation	G	111	Remy, a rat, aspires to become a renowned French chef. However, he fails to realise that people despise rodents and will never enjoy a meal cooked by him.
20	Madagascar	http://resizing.flixster.com/oKyYx8tO-5UYR3hmsx0kbzZ4Nl8=/180x267/dkpu1ddg7pbsk.cloudfront.net/movie/24/97/249793_ori.jpg	2005-05-27	DreamWorks	Comedy	Animation	Adventure	PG	86	A group of animals who have spent all their life in a New York zoo end up in the jungles of Madagascar, and must adjust to living in the wild.
21	Charlie and the Chocolate Factory	http://resizing.flixster.com/1_QYLOL1hIXTD3z7ujcYi8zcqzs=/180x270/dkpu1ddg7pbsk.cloudfront.net/movie/11/17/64/11176489_ori.jpg	2005-07-15	Warner Bros.	Comedy	Adventure	Family	PG	115	Charlie, a young boy from an impoverished family, and four other kids win a tour of an amazing chocolate factory run by an imaginative chocolatier, Willy Wonka, and his staff of Oompa-Loompas.
22	Finding Nemo	http://resizing.flixster.com/L5mJPRUyA5797vXg9oelqZ7jGMA=/180x261/dkpu1ddg7pbsk.cloudfront.net/movie/10/84/19/10841916_ori.jpg	2003-05-30	Disney	Comedy	Animation	Adventure	G	100	After his son gets abducted from the Great Barrier Reef and is dispatched to Sydney, Marlin, a meek clownfish, enlists the help of a forgetful fish and embarks on a journey to bring him home.
23	The Lord of the Rings: The Return of the King	http://resizing.flixster.com/fhym2r2SVtuOpznC0wdmP5QPUfo=/180x270/dkpu1ddg7pbsk.cloudfront.net/movie/11/16/64/11166423_ori.jpg	2003-12-17	New Line	Fantasy	Adventure	Western	PG-13	201	The former Fellowship members prepare for the final battle. While Frodo and Sam approach Mount Doom to destroy the One Ring, they follow Gollum, unaware of the path he is leading them to.
24	Ice Age	http://resizing.flixster.com/G2PNS_GykbZtx_u_kQgBFuVkqFE=/180x265/dkpu1ddg7pbsk.cloudfront.net/movie/10/93/89/10938906_ori.jpg	2002-03-15	20th Century Fox	Comedy	Animation	Adventure	PG	81	Manny the mammoth, Sid the loquacious sloth, and Diego the sabre-toothed tiger go on a comical quest to return a human baby back to his father, across a world on the brink of an ice age.
25	Jurassic Park III	http://resizing.flixster.com/05xnBp8MTXrAFuI8u5mLin1TGQ8=/180x270/dkpu1ddg7pbsk.cloudfront.net/movie/11/16/88/11168887_ori.jpg	2001-07-18	Universal	Sci-Fi	Adventure	Action	PG-13	92	Paul and Amanda Kirby, a wealthy couple, offer research funding to Alan Grant, a doctor, on the condition that he accompanies them to find their missing son on a deadly island.
26	Monsters, Inc.	http://resizing.flixster.com/_5J1AMkrOq_CE-En_0dvf2zqD4c=/180x267/dkpu1ddg7pbsk.cloudfront.net/movie/11/16/65/11166524_ori.jpg	2001-11-02	Disney	Comedy	Animation	Adventure	G	92	Monsters, Inc. is a CGI animated film series and Disney media franchise that began with the 2001 film of the same name, produced by Pixar and distributed by Walt Disney Pictures. The original film was followed by a prequel film Monsters University, released in 2013.
27	The Lord of the Rings: The Fellowship of the Ring	http://resizing.flixster.com/GfBu7mY7UHKd_6TelkAxG0TPgko=/180x270/dkpu1ddg7pbsk.cloudfront.net/movie/11/16/64/11166420_ori.jpg	2001-12-19	New Line Cinema	Fantasy	Adventure	\N	PG-13	178	A young hobbit, Frodo, who has found the One Ring that belongs to the Dark Lord Sauron, begins his journey with eight companions to Mount Doom, the only place where it can be destroyed.
28	Sherlock Holmes	http://resizing.flixster.com/t90NXGvHd_JXdRtTgD2BA8WPQKM=/180x270/dkpu1ddg7pbsk.cloudfront.net/movie/11/16/67/11166728_ori.jpg	2009-12-25	Warner Bros.	Crime	Adventure	Action	PG-13	128	Detective Sherlock Holmes and his stalwart partner Watson engage in a battle of wits and brawn with a nemesis whose plot is a threat to all of England.
29	Avatar	http://resizing.flixster.com/OPDpDBP1P_qiiOjKOW9042R4R3g=/180x270/dkpu1ddg7pbsk.cloudfront.net/movie/11/17/67/11176792_ori.jpg	2009-12-18	Fox	Fantasy	Adventure	Action	PG-13	162	Jake, who is paraplegic, replaces his twin on the Na'vi inhabited Pandora for a corporate mission. After the natives accept him as one of their own, he must decide where his loyalties lie.
30	The Avengers	http://resizing.flixster.com/OmSu9IRUNKgrdmyE2uNhf0f0ToE=/180x266/dkpu1ddg7pbsk.cloudfront.net/movie/11/16/38/11163886_ori.jpg	2012-05-04	Marvel Studios	Sci-Fi	Adventure	Action	PG-13	143	Nick Fury is compelled to launch the Avengers Initiative when Loki poses a threat to planet Earth. His squad of superheroes put their minds together to accomplish the task.
31	The Dark Knight Rises	http://resizing.flixster.com/_7NLUQGoKyQuOq7uhhARpzeku04=/180x270/dkpu1ddg7pbsk.cloudfront.net/movie/11/16/78/11167835_ori.jpg	2012-07-20	Warner Bros.	Thriller	Action	\N	PG-13	165	Bane, an imposing terrorist, attacks Gotham City and disrupts its eight-year-long period of peace. This forces Bruce Wayne to come out of hiding and don the cape and cowl of Batman again.
32	The Hobbit: An Unexpected Journey	http://resizing.flixster.com/vUOEhpcoaWV4JU5YM2dnlgTRyFo=/180x270/dkpu1ddg7pbsk.cloudfront.net/movie/11/17/02/11170263_ori.jpg	2012-12-14	Warner Bros.	Fantasy	Adventure	\N	PG-13	169	Bilbo Baggins, a hobbit, is persuaded into accompanying a wizard and a group of dwarves on a journey to reclaim the city of Erebor and all its riches from the dragon Smaug.
33	Transformers: Age of Extinction	https://themoviegoersblog.files.wordpress.com/2014/06/aqqqqeadfa.jpeg	2014-06-27	Paramount Pictures	Sci-Fi	Adventure	Action	PG-13	165	The Autobots, a faction of robots from the planet Cybertron, are hunted down by an elite CIA black ops unit and a ruthless bounty hunter. They turn to a struggling inventor and his daughter for help.
34	The Twilight Saga: Breaking Dawn - Part 2	http://resizing.flixster.com/9zWAe7c1MPnVtaic66WXWomIkmI=/179x257/dkpu1ddg7pbsk.cloudfront.net/movie/11/16/93/11169337_ori.jpg	2012-11-16	Lionsgate	Fantasy	Drama	Adventure	PG-13	115	Bella is now a vampire and lives happily with Edward and her daughter, Renesmee. When someone misinforms the Volturi that Renesmee is immortal, the latter set out to kill the child and the culprit.
35	Iron Man 3	http://resizing.flixster.com/M8S0ACxWUYK8FJV9hJwnDGK41ZA=/180x257/dkpu1ddg7pbsk.cloudfront.net/movie/11/17/05/11170594_ori.jpg	2013-05-03	Marvel Studios	Sci-Fi	Adventure	Action	PG-13	130	Tony Stark encounters a formidable foe called the Mandarin. After failing to defeat his enemy, Tony embarks on a journey of self-discovery as he fights against the powerful Mandarin.
36	Man of Steel	http://resizing.flixster.com/YdjyBNFfxu1P1f06WcVgadZg8Ow=/180x270/dkpu1ddg7pbsk.cloudfront.net/movie/11/17/42/11174287_ori.jpg	2013-06-14	Warner Bros.	Fantasy	Adventure	Action	PG-13	143	Clark learns about the source of his abilities and his real home when he enters a Kryptonian ship in the Artic. However, an old enemy follows him to Earth in search of a codex and brings destruction.
37	Alice in Wonderland	http://resizing.flixster.com/Keg-ch93mJuhBIB3t7zgFAf2N_c=/180x266/dkpu1ddg7pbsk.cloudfront.net/movie/10/93/73/10937308_ori.jpg	2010-03-05	Walt Disney Pictures	Fantasy	Family	Adventure	PG	108	Alice, now 19 years old, follows a rabbit in a blue coat to a magical wonderland from her dreams where she is reunited with her friends who make her realise her true destiny.
38	Tangled	http://resizing.flixster.com/UuaLvR-fxpgmESPegJcY0F2XJ-c=/180x267/dkpu1ddg7pbsk.cloudfront.net/movie/11/15/80/11158038_ori.png	2010-11-24	Disney	Family	Comedy	Animation	PG	100	Rapunzel, a naive and young girl, is locked up by her overly protective mother. Her wish to escape into the world outside finally comes true when she meets the good-hearted thief, Flynn.
39	The Incredibles	http://resizing.flixster.com/h0n53xP_v-81NZP1OdE2kMkR0ck=/180x266/dkpu1ddg7pbsk.cloudfront.net/movie/10/93/90/10939047_ori.jpg	2004-11-05	Disney	Animation	Adventure	Action	PG	115	Forced to adopt a civilian identity and stuck in a white-collar job, Mr Incredible itches to get back into action. When he is lured into a trap by the evil Syndrome, his family contrives to save him.
40	Shrek 2	http://resizing.flixster.com/Vt--2C7r7DDEyOVV_SDpXxkml38=/180x251/dkpu1ddg7pbsk.cloudfront.net/movie/25/37/253795_ori.jpg	2004-05-19	DreamWorks	Comedy	Animation	Adventure	PG	93	When Shrek and Fiona return from their honeymoon, her parents, the rulers of Far Far Away, invite them over. But as the king does not like Shrek, he enlists a fairy to keep him away from his daughter.
41	The Chronicles of Narnia: The Lion, the Witch and the Wardrobe	http://resizing.flixster.com/aeZ5-j-beDNOTPPM0_gbTX0KAbw=/180x266/dkpu1ddg7pbsk.cloudfront.net/movie/10/91/87/10918786_ori.jpg	2005-12-09	Disney	Fantasy	Family	Adventure	PG	143	Four kids travel through a wardrobe to the land of Narnia and learn of their destiny to free it with the guidance of a mystical lion.
42	Star Wars Episode III: Revenge of the Sith	https://m.media-amazon.com/images/M/MV5BNTc4MTc3NTQ5OF5BMl5BanBnXkFtZTcwOTg0NjI4NA@@._V1_UY264_CR9,0,180,264_AL_.jpg	2005-05-19	20th Century Fox	Fantasy	Adventure	Action	PG-13	140	Anakin joins forces with Obi-Wan and sets Palpatine free from the evil clutches of Count Doku. However, he falls prey to Palpatine and the Jedis' mind games and gives into temptation.
43	Night at the Museum	http://resizing.flixster.com/YUQIBUn5Xp1WT1dWCZiAofYtYuY=/180x270/dkpu1ddg7pbsk.cloudfront.net/movie/11/18/11/11181144_ori.jpg	2006-12-22	Fox	Comedy	Adventure	Action	PG	108	A newly recruited night security guard at the Museum of Natural History discovers that an ancient curse causes the animals and exhibits on display to come to life and wreak havoc.
44	Toy Story 2	http://resizing.flixster.com/apFWspLgFG0LJBKt2Y_-vRJUwoM=/180x257/dkpu1ddg7pbsk.cloudfront.net/movie/10/93/63/10936392_ori.jpg	1999-11-24	Walt Disney Pictures	Comedy	Animation	Adventure	G	92	When Woody is kidnapped by a greedy toy collector and is nowhere to be found, Buzz and his friends set out to rescue him. However, Woody gets tempted by the idea of becoming immortal in a museum.
45	Godzilla	http://resizing.flixster.com/2BsexQCiFCXVsKwiYbiqRysv-dk=/180x249/dkpu1ddg7pbsk.cloudfront.net/movie/25/99/259919_ori.jpg	1998-05-20	TriStar Pictures	Thriller	Sci-Fi	Action	PG-13	139	A giant, mutated lizard goes on a rampage across New York City after attacking a freighter in the Pacific. The disastrous event brings together a team of unlikely heroes who must save the day.
46	Mulan	http://resizing.flixster.com/_UoZLlmHv08EAQNXKLvIUM0gWck=/180x255/dkpu1ddg7pbsk.cloudfront.net/movie/11/14/84/11148476_ori.jpg	1998-06-19	Walt Disney Pictures	Family	Animation	Adventure	G	88	A girl disguises as a male warrior and joins the imperial army in order to prevent her sick father from being forced to enlist as he has no male heir.
47	Titanic	http://resizing.flixster.com/Dln7O1KtZpRmtG0KqU6QH1VES3Y=/180x268/dkpu1ddg7pbsk.cloudfront.net/movie/11/16/63/11166320_ori.jpg	1997-12-19	Paramount Pictures	Romance	Drama	\N	PG-13	194	Seventeen-year-old Rose hails from an aristocratic family and is set to be married. When she boards the Titanic, she meets Jack Dawson, an artist, and falls in love with him.
48	Toy Story	http://resizing.flixster.com/Rw9DiBAFGZ2nsMie2He5iaDVuY0=/180x256/dkpu1ddg7pbsk.cloudfront.net/movie/10/93/63/10936393_ori.jpg	1995-11-22	Walt Disney Pictures	Comedy	Animation	Adventure	G	81	Andy's favourite toy, Woody, is worried that after Andy receives his birthday gift, a new toy called Buzz Lightyear, his importance may get reduced. He thus hatches a plan to eliminate Buzz.
49	Jumanji	http://resizing.flixster.com/ZfAgDI0I7ZvGR4einB6qCg6zixE=/180x268/dkpu1ddg7pbsk.cloudfront.net/movie/56/79/73/5679734_ori.jpg	1995-12-15	TriStar Pictures	Fantasy	Family	Adventure	PG	104	Two children come across a magical board game. While playing it, they meet Alan, a man who was trapped in the game, and attempt to free him while facing different kinds of danger.
50	Thor: The Dark World	http://resizing.flixster.com/sLeSlSjBR_h2MiaJIA63bgyOeHI=/180x257/dkpu1ddg7pbsk.cloudfront.net/movie/11/17/26/11172694_ori.jpg	2013-11-08	Marvel Studios	Fantasy	Adventure	Action	PG-13	112	Thor sets out on a journey to defeat Malekith, the leader of the Dark Elves when he returns to Asgard to retrieve a dangerous weapon and fulfill his desire of destroying the Nine Realms.
\.


--
-- Data for Name: order_data; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.order_data (order_id, account_id, film_id, amount) FROM stdin;
1	32	1	4
2	5	1	1
3	2	2	2
4	4	3	1
5	24	4	1
6	32	6	3
7	22	13	2
8	25	7	1
9	16	8	5
10	49	10	3
11	45	9	2
12	50	5	1
13	12	5	4
14	14	2	2
15	18	1	1
16	27	6	3
17	29	8	3
18	13	8	3
19	34	7	1
20	37	23	2
21	1	12	3
22	1	14	5
23	24	34	2
24	43	23	7
25	21	11	3
26	27	49	1
27	35	47	2
28	12	3	2
29	2	1	4
30	4	5	8
31	11	12	3
32	7	16	1
33	9	17	4
34	6	29	3
35	15	28	5
36	48	45	6
37	44	50	5
38	36	24	4
39	21	21	1
40	46	22	2
41	34	35	1
42	23	38	1
43	27	39	3
44	17	37	4
45	19	45	4
46	18	42	3
47	30	33	5
48	40	41	2
49	20	32	1
50	10	44	3
\.


--
-- Data for Name: price_data; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.price_data (film_id, price) FROM stdin;
1	35000
2	30000
3	30000
4	30000
5	30000
6	35000
7	35000
8	30000
9	30000
10	35000
11	30000
12	35000
13	40000
14	30000
15	30000
16	35000
17	35000
18	40000
19	35000
20	35000
21	35000
22	35000
23	40000
24	30000
25	35000
26	30000
27	40000
28	30000
29	30000
30	40000
31	35000
32	35000
33	30000
34	35000
35	30000
36	40000
37	30000
38	35000
39	35000
40	30000
41	35000
42	30000
43	30000
44	35000
45	30000
46	30000
47	40000
48	40000
49	35000
50	30000
\.


--
-- Name: account_test_account_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.account_test_account_id_seq', 1, false);


--
-- Name: order_data_order_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.order_data_order_id_seq', 1, false);


--
-- Name: account_test account_test_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.account_test
    ADD CONSTRAINT account_test_email_key UNIQUE (email);


--
-- Name: account_test account_test_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.account_test
    ADD CONSTRAINT account_test_pkey PRIMARY KEY (account_id);


--
-- Name: order_data order_data_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_data
    ADD CONSTRAINT order_data_pkey PRIMARY KEY (order_id);


--
-- PostgreSQL database dump complete
--

