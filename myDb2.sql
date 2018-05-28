--
-- PostgreSQL database dump
--

-- Dumped from database version 10.3 (Ubuntu 10.3-1.pgdg16.04+1)
-- Dumped by pg_dump version 10.4 (Ubuntu 10.4-1.pgdg16.04+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: accounts; Type: TABLE; Schema: public; Owner: vtibhlysovzumb
--

CREATE TABLE public.accounts (
    id integer NOT NULL,
    name character varying(120) NOT NULL,
    email character varying(60) NOT NULL,
    password character varying(60) NOT NULL
);


ALTER TABLE public.accounts OWNER TO vtibhlysovzumb;

--
-- Name: accounts_id_seq; Type: SEQUENCE; Schema: public; Owner: vtibhlysovzumb
--

CREATE SEQUENCE public.accounts_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.accounts_id_seq OWNER TO vtibhlysovzumb;

--
-- Name: accounts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: vtibhlysovzumb
--

ALTER SEQUENCE public.accounts_id_seq OWNED BY public.accounts.id;


--
-- Name: books; Type: TABLE; Schema: public; Owner: vtibhlysovzumb
--

CREATE TABLE public.books (
    id integer NOT NULL,
    name character varying(120) NOT NULL,
    author character varying(60) NOT NULL,
    isbn character varying(30),
    userid integer
);


ALTER TABLE public.books OWNER TO vtibhlysovzumb;

--
-- Name: books_id_seq; Type: SEQUENCE; Schema: public; Owner: vtibhlysovzumb
--

CREATE SEQUENCE public.books_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.books_id_seq OWNER TO vtibhlysovzumb;

--
-- Name: books_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: vtibhlysovzumb
--

ALTER SEQUENCE public.books_id_seq OWNED BY public.books.id;


--
-- Name: lectureprogress; Type: TABLE; Schema: public; Owner: vtibhlysovzumb
--

CREATE TABLE public.lectureprogress (
    id integer NOT NULL,
    startdate date NOT NULL,
    enddate date,
    bookid integer,
    userid integer
);


ALTER TABLE public.lectureprogress OWNER TO vtibhlysovzumb;

--
-- Name: lectureprogress_id_seq; Type: SEQUENCE; Schema: public; Owner: vtibhlysovzumb
--

CREATE SEQUENCE public.lectureprogress_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.lectureprogress_id_seq OWNER TO vtibhlysovzumb;

--
-- Name: lectureprogress_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: vtibhlysovzumb
--

ALTER SEQUENCE public.lectureprogress_id_seq OWNED BY public.lectureprogress.id;


--
-- Name: accounts id; Type: DEFAULT; Schema: public; Owner: vtibhlysovzumb
--

ALTER TABLE ONLY public.accounts ALTER COLUMN id SET DEFAULT nextval('public.accounts_id_seq'::regclass);


--
-- Name: books id; Type: DEFAULT; Schema: public; Owner: vtibhlysovzumb
--

ALTER TABLE ONLY public.books ALTER COLUMN id SET DEFAULT nextval('public.books_id_seq'::regclass);


--
-- Name: lectureprogress id; Type: DEFAULT; Schema: public; Owner: vtibhlysovzumb
--

ALTER TABLE ONLY public.lectureprogress ALTER COLUMN id SET DEFAULT nextval('public.lectureprogress_id_seq'::regclass);


--
-- Data for Name: accounts; Type: TABLE DATA; Schema: public; Owner: vtibhlysovzumb
--

COPY public.accounts (id, name, email, password) FROM stdin;
\.


--
-- Data for Name: books; Type: TABLE DATA; Schema: public; Owner: vtibhlysovzumb
--

COPY public.books (id, name, author, isbn, userid) FROM stdin;
\.


--
-- Data for Name: lectureprogress; Type: TABLE DATA; Schema: public; Owner: vtibhlysovzumb
--

COPY public.lectureprogress (id, startdate, enddate, bookid, userid) FROM stdin;
\.


--
-- Name: accounts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: vtibhlysovzumb
--

SELECT pg_catalog.setval('public.accounts_id_seq', 1, false);


--
-- Name: books_id_seq; Type: SEQUENCE SET; Schema: public; Owner: vtibhlysovzumb
--

SELECT pg_catalog.setval('public.books_id_seq', 1, false);


--
-- Name: lectureprogress_id_seq; Type: SEQUENCE SET; Schema: public; Owner: vtibhlysovzumb
--

SELECT pg_catalog.setval('public.lectureprogress_id_seq', 1, false);


--
-- Name: accounts accounts_pkey; Type: CONSTRAINT; Schema: public; Owner: vtibhlysovzumb
--

ALTER TABLE ONLY public.accounts
    ADD CONSTRAINT accounts_pkey PRIMARY KEY (id);


--
-- Name: books books_pkey; Type: CONSTRAINT; Schema: public; Owner: vtibhlysovzumb
--

ALTER TABLE ONLY public.books
    ADD CONSTRAINT books_pkey PRIMARY KEY (id);


--
-- Name: lectureprogress lectureprogress_pkey; Type: CONSTRAINT; Schema: public; Owner: vtibhlysovzumb
--

ALTER TABLE ONLY public.lectureprogress
    ADD CONSTRAINT lectureprogress_pkey PRIMARY KEY (id);


--
-- Name: books books_userid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: vtibhlysovzumb
--

ALTER TABLE ONLY public.books
    ADD CONSTRAINT books_userid_fkey FOREIGN KEY (userid) REFERENCES public.accounts(id);


--
-- Name: lectureprogress lectureprogress_bookid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: vtibhlysovzumb
--

ALTER TABLE ONLY public.lectureprogress
    ADD CONSTRAINT lectureprogress_bookid_fkey FOREIGN KEY (bookid) REFERENCES public.books(id);


--
-- Name: lectureprogress lectureprogress_userid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: vtibhlysovzumb
--

ALTER TABLE ONLY public.lectureprogress
    ADD CONSTRAINT lectureprogress_userid_fkey FOREIGN KEY (userid) REFERENCES public.accounts(id);


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: vtibhlysovzumb
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO vtibhlysovzumb;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: LANGUAGE plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO vtibhlysovzumb;


--
-- PostgreSQL database dump complete
--

