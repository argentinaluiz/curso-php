-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 03/02/2016 às 20:57
-- Versão do servidor: 5.6.28-0ubuntu0.15.04.1
-- Versão do PHP: 5.6.7-1+deb.sury.org~utopic+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `code_education`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`id_pages` int(10) unsigned NOT NULL,
  `title_pages` text NOT NULL,
  `slug_page` text NOT NULL,
  `excerpt_pages` text,
  `date_pages` datetime NOT NULL,
  `author_pages` varchar(100) NOT NULL,
  `content_pages` longtext
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `pages`
--

INSERT INTO `pages` (`id_pages`, `title_pages`, `slug_page`, `excerpt_pages`, `date_pages`, `author_pages`, `content_pages`) VALUES
(1, 'Home', 'home', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, pariatur, repellat, qui, quisquam impedit ea minima sequi laudantium earum explicabo ratione illo neque esse rem voluptate at dicta non porro.', '2016-02-03 20:17:10', 'Marcia', '<div class="col-sm-3">\r\n    <img src="http://lorempixel.com/300/300/abstract/" alt="Abstract" class="img-responsive">\r\n</div>\r\n<div class="col-sm-9">\r\n    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, pariatur, repellat, qui, quisquam impedit ea minima sequi laudantium earum explicabo ratione illo neque esse rem voluptate at dicta non porro.</p>\r\n    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, aperiam ipsam dolorum quae vero blanditiis fugit corporis ab modi obcaecati doloribus molestias officiis dolore expedita fuga ducimus nihil eius eveniet!</p>\r\n    <p>In, inventore, corporis optio asperiores adipisci error sunt eum quam saepe repellendus fugiat id dolor magnam quasi non voluptatibus quae iure aliquam minima aperiam? Eveniet, saepe vero suscipit praesentium cumque.</p>\r\n</div>'),
(2, 'A empresa', 'a-empresa', 'Consectetur adipisicing elit. Voluptas, pariatur, repellat, qui, quisquam impedit ea minima sequi laudantium earum explicabo ratione illo neque esse rem voluptate at dicta non porro.', '2016-02-03 20:19:32', 'Marcia', '<div class="col-sm-9">\r\n    <p>Consectetur adipisicing elit. Voluptas, pariatur, repellat, qui, quisquam impedit ea minima sequi laudantium earum explicabo ratione illo neque esse rem voluptate at dicta non porro.</p>\r\n    <p>Ad, aperiam ipsam dolorum quae vero blanditiis fugit corporis ab modi obcaecati doloribus molestias officiis dolore expedita fuga ducimus nihil eius eveniet! In, inventore, corporis optio asperiores adipisci error sunt eum quam saepe repellendus fugiat id dolor magnam quasi non voluptatibus quae iure aliquam minima aperiam? Eveniet, saepe vero suscipit praesentium cumque.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam pariatur maxime doloribus minus dolore vel totam ab. Illo, reiciendis, nostrum, voluptatem temporibus beatae non rem repudiandae necessitatibus porro maxime tenetur?</p>\r\n</div>\r\n<div class="col-sm-3">\r\n    <img src="http://lorempixel.com/300/300/business/" alt="Business" class="img-responsive">\r\n</div>\r\n'),
(3, 'Nossos Produtos', 'nossos-produtos', NULL, '2016-02-03 20:23:16', 'Marcia', '            <p>Fugit, iusto, rerum, quos laboriosam illum recusandae fuga qui eaque debitis eligendi a odit veniam nihil saepe nam adipisci amet placeat fugiat!</p>\r\n                <p><a href="#" class="btn btn-primary" role="button">Leia Mais</a></p>\r\n            </div>\r\n        </div>\r\n    </div>\r\n    \r\n    <div class="col-sm-6 col-md-4">\r\n        <div class="thumbnail">\r\n            <img src="http://lorempixel.com/340/200/transport/" alt="Produto2" class="img-responsive">\r\n            <div class="caption">\r\n                <h3>Lorem Ipsum</h3>\r\n                <p>Fugit, iusto, rerum, quos laboriosam illum recusandae fuga qui eaque debitis eligendi a odit veniam nihil saepe nam adipisci amet placeat fugiat!</p>\r\n                <p><a href="#" class="btn btn-primary" role="button">Leia Mais</a></p>\r\n            </div>\r\n        </div>\r\n    </div>\r\n    \r\n    <div class="col-sm-6 col-md-4">\r\n        <div class="thumbnail">\r\n            <img src="http://lorempixel.com/340/200/nature/" alt="Produto3" class="img-responsive">\r\n            <div class="caption">\r\n                <h3>Lorem Ipsum</h3>\r\n                <p>Fugit, iusto, rerum, quos laboriosam illum recusandae fuga qui eaque debitis eligendi a odit veniam nihil saepe nam adipisci amet placeat fugiat!</p>\r\n                <p><a href="#" class="btn btn-primary" role="button">Leia Mais</a></p>\r\n            </div>\r\n        </div>\r\n    </div>'),
(4, 'Nossos Serviços', 'nossos-servicos', NULL, '2016-02-03 20:54:24', 'Marcia', '<div class="col-sm-6 col-md-4">\r\n        <div class="thumbnail">\r\n            <img src="http://lorempixel.com/340/200/city/" alt="Serviço1" class="img-responsive">\r\n            <div class="caption">\r\n                <h3>Laboriosam illum recusandae</h3>\r\n                <p>Fugit, iusto, rerum, quos laboriosam illum recusandae fuga qui eaque debitis eligendi a odit veniam nihil saepe nam adipisci amet placeat fugiat!</p>\r\n                <p><a href="#" class="btn btn-primary" role="button">Leia Mais</a></p>\r\n            </div>\r\n        </div>\r\n    </div>\r\n    \r\n    <div class="col-sm-6 col-md-4">\r\n        <div class="thumbnail">\r\n            <img src="http://lorempixel.com/340/200/people/" alt="Serviço2" class="img-responsive">\r\n            <div class="caption">\r\n                <h3>Veniam nihil</h3>\r\n                <p>Fugit, iusto, rerum, quos laboriosam illum recusandae fuga qui eaque debitis eligendi a odit veniam nihil saepe nam adipisci amet placeat fugiat!</p>\r\n                <p><a href="#" class="btn btn-primary" role="button">Leia Mais</a></p>\r\n            </div>\r\n        </div>\r\n    </div>\r\n    \r\n    <div class="col-sm-6 col-md-4">\r\n        <div class="thumbnail">\r\n            <img src="http://lorempixel.com/340/200/transport/" alt="Serviço3" class="img-responsive">\r\n            <div class="caption">\r\n                <h3>Recusandae fuga</h3>\r\n                <p>Fugit, iusto, rerum, quos laboriosam illum recusandae fuga qui eaque debitis eligendi a odit veniam nihil saepe nam adipisci amet placeat fugiat!</p>\r\n                <p><a href="#" class="btn btn-primary" role="button">Leia Mais</a></p>\r\n            </div>\r\n        </div>\r\n    </div>\r\n'),
(5, 'Contato', 'contato', NULL, '2016-02-03 20:55:46', 'Marcia', ' <div class="col-sm-5">\r\n    <h2>Fale Conosco</h2>\r\n    <form action="/respostaForm" method="post" id="contato">\r\n        \r\n        <div class="form-group">\r\n            <label for="nome">Nome</label>\r\n            <input type="text" name="nome" id="nome" class="form-control">\r\n        </div>\r\n        \r\n        <div class="form-group">\r\n            <label for="email">e-Mail</label>\r\n            <input type="email" name="email" id="email" class="form-control">\r\n        </div>\r\n        \r\n        <div class="form-group">\r\n            <label for="assunto">Assunto</label>\r\n            <input type="text" name="assunto" id="assunto" class="form-control">\r\n        </div>\r\n        \r\n        <div class="form-group">\r\n            <label for="mensagem">Mensagem</label>\r\n            <textarea name="mensagem" id="mensagem" cols="30" rows="10" class="form-control"></textarea>\r\n        </div>\r\n        \r\n        <div class="form-group">\r\n            <input type="submit" value="Enviar" class="btn btn-primary">\r\n        </div>\r\n        <div id="status-form"></div>\r\n        \r\n    </form>\r\n</div>\r\n<div class="col-sm-7">\r\n    \r\n    <div class="row">\r\n        <h2 class="col-sm-12">Omnis obcaecati dignissimos corporis animi.</h2>\r\n        <div class="col-sm-3">\r\n            <img src="http://lorempixel.com/200/300/sports/" alt="Business" class="img-responsive">\r\n        </div>\r\n        <div class="col-sm-9">\r\n            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, veritatis, tenetur, mollitia officiis qui quidem necessitatibus facere cum ducimus sequi perspiciatis quisquam vitae eos recusandae consequatur neque aspernatur minus sit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, ullam, nobis, necessitatibus, natus nisi quod velit accusantium asperiores rerum debitis tempora vel minima iure voluptates aspernatur fugit perspiciatis facere odio!</p>\r\n            <p><a href="#" class="btn btn-default">Adipisicing elit!</a></p>\r\n        </div>\r\n    </div>         \r\n    <div class="row">\r\n        <h2 class="col-sm-12">Natus nisi quod velit accusantium asperiores.</h2>\r\n        <div class="col-sm-3">\r\n            <img src="http://lorempixel.com/200/300/transport/" alt="Business" class="img-responsive">\r\n        </div>\r\n        <div class="col-sm-9">\r\n            <p>Ullam, nobis, necessitatibus, natus nisi quod velit accusantium asperiores rerum debitis tempora vel minima iure voluptates aspernatur fugit perspiciatis facere odio!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, veritatis, tenetur, mollitia officiis qui quidem necessitatibus facere cum ducimus sequi perspiciatis quisquam vitae eos recusandae consequatur neque aspernatur minus sit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis.</p>\r\n            <p><a href="#" class="btn btn-default">Recusandae consequatur</a></p>\r\n        </div>\r\n    </div> \r\n        \r\n</div>\r\n<script>\r\n    $(function(){\r\n        var form = $(''form#contato'');\r\n        var status = $(''div#status-form'');\r\n        var vazio = 0;\r\n        \r\n        form.submit(function(){            \r\n            $.map(form.serializeArray(), function(valor){\r\n                if(valor.value === ''''){\r\n                    vazio++;\r\n                };\r\n            });//Map\r\n            \r\n            if(vazio > 0){\r\n                vazio = 0;\r\n                status.hide().html(''<p class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-remove"></span>  Por favor, preencha todos os campos </p>'').fadeIn();\r\n                $(''input, textarea'').focusin(function(){\r\n                    status.fadeOut();\r\n                });\r\n                return false;\r\n            }\r\n        });//Submit\r\n        \r\n    });\r\n</script>');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`id_pages`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `pages`
--
ALTER TABLE `pages`
MODIFY `id_pages` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
