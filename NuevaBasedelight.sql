PGDMP         ;                x            delight    12.1    12.1 Q    |           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            }           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            ~           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    139810    delight    DATABASE     �   CREATE DATABASE delight WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Spain.1252' LC_CTYPE = 'Spanish_Spain.1252';
    DROP DATABASE delight;
                postgres    false            �            1259    139813    tb_administradores    TABLE     �  CREATE TABLE public.tb_administradores (
    id_administrador integer NOT NULL,
    usuario character varying(25),
    nombre character varying(50),
    correo character varying(60),
    telefono numeric(8,0),
    clave character varying(100),
    estado_admin character varying(10) DEFAULT 'Activo'::character varying,
    CONSTRAINT tb_administradores_estado_admin_check CHECK (((estado_admin)::text = ANY ((ARRAY['Activo'::character varying, 'Inactivo'::character varying])::text[])))
);
 &   DROP TABLE public.tb_administradores;
       public         heap    postgres    false            �            1259    139811 '   tb_administradores_id_administrador_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_administradores_id_administrador_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 >   DROP SEQUENCE public.tb_administradores_id_administrador_seq;
       public          postgres    false    203            �           0    0 '   tb_administradores_id_administrador_seq    SEQUENCE OWNED BY     s   ALTER SEQUENCE public.tb_administradores_id_administrador_seq OWNED BY public.tb_administradores.id_administrador;
          public          postgres    false    202            �            1259    139842    tb_categoria    TABLE     �   CREATE TABLE public.tb_categoria (
    id_categoria integer NOT NULL,
    nombre character varying(25),
    descripcion character varying(100),
    imagen character varying(50)
);
     DROP TABLE public.tb_categoria;
       public         heap    postgres    false            �            1259    139840    tb_categoria_id_categoria_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_categoria_id_categoria_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.tb_categoria_id_categoria_seq;
       public          postgres    false    209            �           0    0    tb_categoria_id_categoria_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.tb_categoria_id_categoria_seq OWNED BY public.tb_categoria.id_categoria;
          public          postgres    false    208            �            1259    139823 
   tb_cliente    TABLE     	  CREATE TABLE public.tb_cliente (
    id_cliente integer NOT NULL,
    usuario character varying(15),
    nombre character varying(50),
    direccion character varying(100),
    correo character varying(60),
    telefono character varying(8),
    clave character varying(100),
    estado_cliente character varying(10) DEFAULT 'Activo'::character varying,
    CONSTRAINT tb_cliente_estado_cliente_check CHECK (((estado_cliente)::text = ANY ((ARRAY['Activo'::character varying, 'Inactivo'::character varying])::text[])))
);
    DROP TABLE public.tb_cliente;
       public         heap    postgres    false            �            1259    139821    tb_cliente_id_cliente_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_cliente_id_cliente_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.tb_cliente_id_cliente_seq;
       public          postgres    false    205            �           0    0    tb_cliente_id_cliente_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.tb_cliente_id_cliente_seq OWNED BY public.tb_cliente.id_cliente;
          public          postgres    false    204            �            1259    139929    tb_contactenos    TABLE     �   CREATE TABLE public.tb_contactenos (
    id_contacto bigint NOT NULL,
    titulo_asunto character varying(50),
    asunto character varying(200),
    id_cliente integer
);
 "   DROP TABLE public.tb_contactenos;
       public         heap    postgres    false            �            1259    139927    tb_contactenos_id_contacto_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_contactenos_id_contacto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 5   DROP SEQUENCE public.tb_contactenos_id_contacto_seq;
       public          postgres    false    221            �           0    0    tb_contactenos_id_contacto_seq    SEQUENCE OWNED BY     a   ALTER SEQUENCE public.tb_contactenos_id_contacto_seq OWNED BY public.tb_contactenos.id_contacto;
          public          postgres    false    220            �            1259    139833 
   tb_cupones    TABLE     �   CREATE TABLE public.tb_cupones (
    id_cupon integer NOT NULL,
    puntos numeric(10,0),
    opcion character varying(25),
    CONSTRAINT tb_cupones_puntos_check CHECK ((puntos > (0)::numeric))
);
    DROP TABLE public.tb_cupones;
       public         heap    postgres    false            �            1259    139831    tb_cupones_id_cupon_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_cupones_id_cupon_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.tb_cupones_id_cupon_seq;
       public          postgres    false    207            �           0    0    tb_cupones_id_cupon_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.tb_cupones_id_cupon_seq OWNED BY public.tb_cupones.id_cupon;
          public          postgres    false    206            �            1259    139886    tb_detelle_pedido    TABLE     X  CREATE TABLE public.tb_detelle_pedido (
    id_detalle_pedido integer NOT NULL,
    id_producto integer,
    precio numeric(5,2),
    cantidad numeric(5,0),
    id_pedido integer,
    CONSTRAINT tb_detelle_pedido_cantidad_check CHECK ((cantidad > (0)::numeric)),
    CONSTRAINT tb_detelle_pedido_precio_check CHECK ((precio > (0)::numeric))
);
 %   DROP TABLE public.tb_detelle_pedido;
       public         heap    postgres    false            �            1259    139884 '   tb_detelle_pedido_id_detalle_pedido_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_detelle_pedido_id_detalle_pedido_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 >   DROP SEQUENCE public.tb_detelle_pedido_id_detalle_pedido_seq;
       public          postgres    false    215            �           0    0 '   tb_detelle_pedido_id_detalle_pedido_seq    SEQUENCE OWNED BY     s   ALTER SEQUENCE public.tb_detelle_pedido_id_detalle_pedido_seq OWNED BY public.tb_detelle_pedido.id_detalle_pedido;
          public          postgres    false    214            �            1259    139921    tb_noticias    TABLE     �   CREATE TABLE public.tb_noticias (
    id_noticia bigint NOT NULL,
    titulo character varying(50),
    descripcion character varying(300),
    imagen character varying(50),
    fecha_pub date
);
    DROP TABLE public.tb_noticias;
       public         heap    postgres    false            �            1259    139919    tb_noticias_id_noticia_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_noticias_id_noticia_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.tb_noticias_id_noticia_seq;
       public          postgres    false    219            �           0    0    tb_noticias_id_noticia_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.tb_noticias_id_noticia_seq OWNED BY public.tb_noticias.id_noticia;
          public          postgres    false    218            �            1259    139866 
   tb_pedidos    TABLE     >  CREATE TABLE public.tb_pedidos (
    id_pedido integer NOT NULL,
    id_cliente integer,
    id_cupon integer,
    costo_envio numeric(5,2),
    fecha_pedido date,
    fecha_entrega date,
    estadopedido smallint DEFAULT 0 NOT NULL,
    CONSTRAINT tb_pedidos_costo_envio_check CHECK ((costo_envio > (0)::numeric))
);
    DROP TABLE public.tb_pedidos;
       public         heap    postgres    false            �            1259    139864    tb_pedidos_id_pedido_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_pedidos_id_pedido_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.tb_pedidos_id_pedido_seq;
       public          postgres    false    213            �           0    0    tb_pedidos_id_pedido_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.tb_pedidos_id_pedido_seq OWNED BY public.tb_pedidos.id_pedido;
          public          postgres    false    212            �            1259    139850    tb_productos    TABLE       CREATE TABLE public.tb_productos (
    id_producto integer NOT NULL,
    nombre_p character varying(50),
    precio numeric(5,2),
    descripcion character varying(100),
    imagen character varying(50),
    id_categoria integer,
    estado character varying(100) DEFAULT 'En existencias'::character varying,
    CONSTRAINT tb_productos_estado_check CHECK (((estado)::text = ANY ((ARRAY['En existencias'::character varying, 'Agotado'::character varying])::text[]))),
    CONSTRAINT tb_productos_precio_check CHECK ((precio > (0)::numeric))
);
     DROP TABLE public.tb_productos;
       public         heap    postgres    false            �            1259    139848    tb_productos_id_producto_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_productos_id_producto_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.tb_productos_id_producto_seq;
       public          postgres    false    211            �           0    0    tb_productos_id_producto_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.tb_productos_id_producto_seq OWNED BY public.tb_productos.id_producto;
          public          postgres    false    210            �            1259    139906 
   tb_resenia    TABLE     �  CREATE TABLE public.tb_resenia (
    id_resenia integer NOT NULL,
    calificacion integer,
    comentario character varying(100),
    estado character varying(100) DEFAULT 'Activo'::character varying,
    id_detalle_pedido integer,
    CONSTRAINT tb_resenia_estado_check CHECK (((estado)::text = ANY ((ARRAY['Activo'::character varying, 'Suspendido'::character varying])::text[])))
);
    DROP TABLE public.tb_resenia;
       public         heap    postgres    false            �            1259    139904    tb_resenia_id_resenia_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_resenia_id_resenia_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.tb_resenia_id_resenia_seq;
       public          postgres    false    217            �           0    0    tb_resenia_id_resenia_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.tb_resenia_id_resenia_seq OWNED BY public.tb_resenia.id_resenia;
          public          postgres    false    216            �
           2604    139816 #   tb_administradores id_administrador    DEFAULT     �   ALTER TABLE ONLY public.tb_administradores ALTER COLUMN id_administrador SET DEFAULT nextval('public.tb_administradores_id_administrador_seq'::regclass);
 R   ALTER TABLE public.tb_administradores ALTER COLUMN id_administrador DROP DEFAULT;
       public          postgres    false    203    202    203            �
           2604    139845    tb_categoria id_categoria    DEFAULT     �   ALTER TABLE ONLY public.tb_categoria ALTER COLUMN id_categoria SET DEFAULT nextval('public.tb_categoria_id_categoria_seq'::regclass);
 H   ALTER TABLE public.tb_categoria ALTER COLUMN id_categoria DROP DEFAULT;
       public          postgres    false    208    209    209            �
           2604    139826    tb_cliente id_cliente    DEFAULT     ~   ALTER TABLE ONLY public.tb_cliente ALTER COLUMN id_cliente SET DEFAULT nextval('public.tb_cliente_id_cliente_seq'::regclass);
 D   ALTER TABLE public.tb_cliente ALTER COLUMN id_cliente DROP DEFAULT;
       public          postgres    false    204    205    205            �
           2604    139932    tb_contactenos id_contacto    DEFAULT     �   ALTER TABLE ONLY public.tb_contactenos ALTER COLUMN id_contacto SET DEFAULT nextval('public.tb_contactenos_id_contacto_seq'::regclass);
 I   ALTER TABLE public.tb_contactenos ALTER COLUMN id_contacto DROP DEFAULT;
       public          postgres    false    221    220    221            �
           2604    139836    tb_cupones id_cupon    DEFAULT     z   ALTER TABLE ONLY public.tb_cupones ALTER COLUMN id_cupon SET DEFAULT nextval('public.tb_cupones_id_cupon_seq'::regclass);
 B   ALTER TABLE public.tb_cupones ALTER COLUMN id_cupon DROP DEFAULT;
       public          postgres    false    206    207    207            �
           2604    139889 #   tb_detelle_pedido id_detalle_pedido    DEFAULT     �   ALTER TABLE ONLY public.tb_detelle_pedido ALTER COLUMN id_detalle_pedido SET DEFAULT nextval('public.tb_detelle_pedido_id_detalle_pedido_seq'::regclass);
 R   ALTER TABLE public.tb_detelle_pedido ALTER COLUMN id_detalle_pedido DROP DEFAULT;
       public          postgres    false    215    214    215            �
           2604    139924    tb_noticias id_noticia    DEFAULT     �   ALTER TABLE ONLY public.tb_noticias ALTER COLUMN id_noticia SET DEFAULT nextval('public.tb_noticias_id_noticia_seq'::regclass);
 E   ALTER TABLE public.tb_noticias ALTER COLUMN id_noticia DROP DEFAULT;
       public          postgres    false    219    218    219            �
           2604    139869    tb_pedidos id_pedido    DEFAULT     |   ALTER TABLE ONLY public.tb_pedidos ALTER COLUMN id_pedido SET DEFAULT nextval('public.tb_pedidos_id_pedido_seq'::regclass);
 C   ALTER TABLE public.tb_pedidos ALTER COLUMN id_pedido DROP DEFAULT;
       public          postgres    false    213    212    213            �
           2604    139853    tb_productos id_producto    DEFAULT     �   ALTER TABLE ONLY public.tb_productos ALTER COLUMN id_producto SET DEFAULT nextval('public.tb_productos_id_producto_seq'::regclass);
 G   ALTER TABLE public.tb_productos ALTER COLUMN id_producto DROP DEFAULT;
       public          postgres    false    211    210    211            �
           2604    139909    tb_resenia id_resenia    DEFAULT     ~   ALTER TABLE ONLY public.tb_resenia ALTER COLUMN id_resenia SET DEFAULT nextval('public.tb_resenia_id_resenia_seq'::regclass);
 D   ALTER TABLE public.tb_resenia ALTER COLUMN id_resenia DROP DEFAULT;
       public          postgres    false    216    217    217            g          0    139813    tb_administradores 
   TABLE DATA           v   COPY public.tb_administradores (id_administrador, usuario, nombre, correo, telefono, clave, estado_admin) FROM stdin;
    public          postgres    false    203   Dj       m          0    139842    tb_categoria 
   TABLE DATA           Q   COPY public.tb_categoria (id_categoria, nombre, descripcion, imagen) FROM stdin;
    public          postgres    false    209   �j       i          0    139823 
   tb_cliente 
   TABLE DATA           u   COPY public.tb_cliente (id_cliente, usuario, nombre, direccion, correo, telefono, clave, estado_cliente) FROM stdin;
    public          postgres    false    205   �k       y          0    139929    tb_contactenos 
   TABLE DATA           X   COPY public.tb_contactenos (id_contacto, titulo_asunto, asunto, id_cliente) FROM stdin;
    public          postgres    false    221   'l       k          0    139833 
   tb_cupones 
   TABLE DATA           >   COPY public.tb_cupones (id_cupon, puntos, opcion) FROM stdin;
    public          postgres    false    207   Dl       s          0    139886    tb_detelle_pedido 
   TABLE DATA           h   COPY public.tb_detelle_pedido (id_detalle_pedido, id_producto, precio, cantidad, id_pedido) FROM stdin;
    public          postgres    false    215   ~l       w          0    139921    tb_noticias 
   TABLE DATA           Y   COPY public.tb_noticias (id_noticia, titulo, descripcion, imagen, fecha_pub) FROM stdin;
    public          postgres    false    219   �l       q          0    139866 
   tb_pedidos 
   TABLE DATA           }   COPY public.tb_pedidos (id_pedido, id_cliente, id_cupon, costo_envio, fecha_pedido, fecha_entrega, estadopedido) FROM stdin;
    public          postgres    false    213   zm       o          0    139850    tb_productos 
   TABLE DATA           p   COPY public.tb_productos (id_producto, nombre_p, precio, descripcion, imagen, id_categoria, estado) FROM stdin;
    public          postgres    false    211   �m       u          0    139906 
   tb_resenia 
   TABLE DATA           e   COPY public.tb_resenia (id_resenia, calificacion, comentario, estado, id_detalle_pedido) FROM stdin;
    public          postgres    false    217   Hp       �           0    0 '   tb_administradores_id_administrador_seq    SEQUENCE SET     U   SELECT pg_catalog.setval('public.tb_administradores_id_administrador_seq', 1, true);
          public          postgres    false    202            �           0    0    tb_categoria_id_categoria_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.tb_categoria_id_categoria_seq', 5, true);
          public          postgres    false    208            �           0    0    tb_cliente_id_cliente_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.tb_cliente_id_cliente_seq', 1, true);
          public          postgres    false    204            �           0    0    tb_contactenos_id_contacto_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public.tb_contactenos_id_contacto_seq', 1, false);
          public          postgres    false    220            �           0    0    tb_cupones_id_cupon_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.tb_cupones_id_cupon_seq', 2, true);
          public          postgres    false    206            �           0    0 '   tb_detelle_pedido_id_detalle_pedido_seq    SEQUENCE SET     V   SELECT pg_catalog.setval('public.tb_detelle_pedido_id_detalle_pedido_seq', 1, false);
          public          postgres    false    214            �           0    0    tb_noticias_id_noticia_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.tb_noticias_id_noticia_seq', 2, true);
          public          postgres    false    218            �           0    0    tb_pedidos_id_pedido_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.tb_pedidos_id_pedido_seq', 1, false);
          public          postgres    false    212            �           0    0    tb_productos_id_producto_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.tb_productos_id_producto_seq', 19, true);
          public          postgres    false    210            �           0    0    tb_resenia_id_resenia_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.tb_resenia_id_resenia_seq', 1, false);
          public          postgres    false    216            �
           2606    139820 *   tb_administradores tb_administradores_pkey 
   CONSTRAINT     v   ALTER TABLE ONLY public.tb_administradores
    ADD CONSTRAINT tb_administradores_pkey PRIMARY KEY (id_administrador);
 T   ALTER TABLE ONLY public.tb_administradores DROP CONSTRAINT tb_administradores_pkey;
       public            postgres    false    203            �
           2606    139847    tb_categoria tb_categoria_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.tb_categoria
    ADD CONSTRAINT tb_categoria_pkey PRIMARY KEY (id_categoria);
 H   ALTER TABLE ONLY public.tb_categoria DROP CONSTRAINT tb_categoria_pkey;
       public            postgres    false    209            �
           2606    139830    tb_cliente tb_cliente_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.tb_cliente
    ADD CONSTRAINT tb_cliente_pkey PRIMARY KEY (id_cliente);
 D   ALTER TABLE ONLY public.tb_cliente DROP CONSTRAINT tb_cliente_pkey;
       public            postgres    false    205            �
           2606    139934 "   tb_contactenos tb_contactenos_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.tb_contactenos
    ADD CONSTRAINT tb_contactenos_pkey PRIMARY KEY (id_contacto);
 L   ALTER TABLE ONLY public.tb_contactenos DROP CONSTRAINT tb_contactenos_pkey;
       public            postgres    false    221            �
           2606    139839    tb_cupones tb_cupones_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public.tb_cupones
    ADD CONSTRAINT tb_cupones_pkey PRIMARY KEY (id_cupon);
 D   ALTER TABLE ONLY public.tb_cupones DROP CONSTRAINT tb_cupones_pkey;
       public            postgres    false    207            �
           2606    139893 (   tb_detelle_pedido tb_detelle_pedido_pkey 
   CONSTRAINT     u   ALTER TABLE ONLY public.tb_detelle_pedido
    ADD CONSTRAINT tb_detelle_pedido_pkey PRIMARY KEY (id_detalle_pedido);
 R   ALTER TABLE ONLY public.tb_detelle_pedido DROP CONSTRAINT tb_detelle_pedido_pkey;
       public            postgres    false    215            �
           2606    139926    tb_noticias tb_noticias_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.tb_noticias
    ADD CONSTRAINT tb_noticias_pkey PRIMARY KEY (id_noticia);
 F   ALTER TABLE ONLY public.tb_noticias DROP CONSTRAINT tb_noticias_pkey;
       public            postgres    false    219            �
           2606    139873    tb_pedidos tb_pedidos_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.tb_pedidos
    ADD CONSTRAINT tb_pedidos_pkey PRIMARY KEY (id_pedido);
 D   ALTER TABLE ONLY public.tb_pedidos DROP CONSTRAINT tb_pedidos_pkey;
       public            postgres    false    213            �
           2606    139858    tb_productos tb_productos_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public.tb_productos
    ADD CONSTRAINT tb_productos_pkey PRIMARY KEY (id_producto);
 H   ALTER TABLE ONLY public.tb_productos DROP CONSTRAINT tb_productos_pkey;
       public            postgres    false    211            �
           2606    139913    tb_resenia tb_resenia_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.tb_resenia
    ADD CONSTRAINT tb_resenia_pkey PRIMARY KEY (id_resenia);
 D   ALTER TABLE ONLY public.tb_resenia DROP CONSTRAINT tb_resenia_pkey;
       public            postgres    false    217            �
           2606    139935 -   tb_contactenos tb_contactenos_id_cliente_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.tb_contactenos
    ADD CONSTRAINT tb_contactenos_id_cliente_fkey FOREIGN KEY (id_cliente) REFERENCES public.tb_cliente(id_cliente);
 W   ALTER TABLE ONLY public.tb_contactenos DROP CONSTRAINT tb_contactenos_id_cliente_fkey;
       public          postgres    false    2768    221    205            �
           2606    139899 2   tb_detelle_pedido tb_detelle_pedido_id_pedido_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.tb_detelle_pedido
    ADD CONSTRAINT tb_detelle_pedido_id_pedido_fkey FOREIGN KEY (id_pedido) REFERENCES public.tb_pedidos(id_pedido);
 \   ALTER TABLE ONLY public.tb_detelle_pedido DROP CONSTRAINT tb_detelle_pedido_id_pedido_fkey;
       public          postgres    false    213    2776    215            �
           2606    139894 4   tb_detelle_pedido tb_detelle_pedido_id_producto_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.tb_detelle_pedido
    ADD CONSTRAINT tb_detelle_pedido_id_producto_fkey FOREIGN KEY (id_producto) REFERENCES public.tb_productos(id_producto);
 ^   ALTER TABLE ONLY public.tb_detelle_pedido DROP CONSTRAINT tb_detelle_pedido_id_producto_fkey;
       public          postgres    false    215    211    2774            �
           2606    139874 %   tb_pedidos tb_pedidos_id_cliente_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.tb_pedidos
    ADD CONSTRAINT tb_pedidos_id_cliente_fkey FOREIGN KEY (id_cliente) REFERENCES public.tb_cliente(id_cliente);
 O   ALTER TABLE ONLY public.tb_pedidos DROP CONSTRAINT tb_pedidos_id_cliente_fkey;
       public          postgres    false    2768    205    213            �
           2606    139879 #   tb_pedidos tb_pedidos_id_cupon_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.tb_pedidos
    ADD CONSTRAINT tb_pedidos_id_cupon_fkey FOREIGN KEY (id_cupon) REFERENCES public.tb_cupones(id_cupon);
 M   ALTER TABLE ONLY public.tb_pedidos DROP CONSTRAINT tb_pedidos_id_cupon_fkey;
       public          postgres    false    2770    213    207            �
           2606    139859 +   tb_productos tb_productos_id_categoria_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.tb_productos
    ADD CONSTRAINT tb_productos_id_categoria_fkey FOREIGN KEY (id_categoria) REFERENCES public.tb_categoria(id_categoria);
 U   ALTER TABLE ONLY public.tb_productos DROP CONSTRAINT tb_productos_id_categoria_fkey;
       public          postgres    false    209    2772    211            �
           2606    139914 ,   tb_resenia tb_resenia_id_detalle_pedido_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.tb_resenia
    ADD CONSTRAINT tb_resenia_id_detalle_pedido_fkey FOREIGN KEY (id_detalle_pedido) REFERENCES public.tb_detelle_pedido(id_detalle_pedido);
 V   ALTER TABLE ONLY public.tb_resenia DROP CONSTRAINT tb_resenia_id_detalle_pedido_fkey;
       public          postgres    false    215    217    2778            g   |   x�3�LN,*I�t/���I-��Wp���|��������\NsS333###N�JC�LW/c���|ϊ�d�r�b�Ҫ��Lg���t��ʬҰ�\�����|���BN��̲|�=... ��'p      m   �   x�M�;�0���=EOP����011���S�qI�r.����x����.a?��$gP����t.�/��4$x4
��E����׊��%���pDk�N�t["K�a	3�(ۦn6_�	׸[����F��z>~tՠ�`g��-A��|���Y-�c��B�V\�$I^�K�      i   �   x���
�  �>���t��[�ѢCtt���,͘��v��cH���X�X�/�f�(,���A@z+��X*�C��i�9"<V�z���hyb�x�J��OLP�ƺM��Kp^�����rZ2�e4_��c��,�      y      x������ � �      k   *   x�3�4�JMO���22��SJ�K�ҋK2��b���� ��	�      s      x������ � �      w   �   x�]�1��0Ek�: 0N�lI��6���cSpz�Pl��z���U}���R��B�#�� g��'�ަ����o�0LG'/8��R����ź���ijq3ǫ�t��ڬu�tK�ؔ����!.��2�D	��I���2��~Vp`���p+�M�(GdN�ʉ�HE��+�R��R`B���*uc��֘��M�4/X�bF      q      x������ � �      o   �  x���Mn�0���)xC?�(-�ċEQ4讛9rhP�KIA�[��X��Uۉ�dcؐ���7#�#��z�������$a�  �������[�K%�jAn�=���q�m��2�oRA���hg���>��{��#�����eV�8�W�/�1x���t0 K��`�wv��X��I�9�t.KPj���i�%���J�wl��8#�WŅV5�l��4qI�����Y���>ѢRƻ�\�Er��_򢞉��;��tS�]��`�օ�dv�X^Q^�|�5%�=�\��t����"SM=q�7!WW`���L��1��}�P�fձE��0�k�"�B��sO�=А����Pe"2���Xze)��'b�`�2+�lG�K�Ac|�����>�M�JT%��\��h-R�I�<4��>��:JG$�q�:�׈\����s��,��ᷢ)�89W��(�,h�&�n��b7��0ٶ���ʬhD��+� c��Ќ�Wg��VCf*iZ�­ٝ��h�����������M�Ϛ�1�Q���{O��O�<�Y��+�����|t&N5��}����%�͹ʓZ��u���S�O�9E�b� ,�J�F/�
QB�+"�+�y�~޺�M�M+-N�B�E�$�J��m�on7e����S�0b�0��{��g��ނs��۽���l6� �Y�      u      x������ � �     