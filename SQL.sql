create table roles
(
    id int auto_increment
        primary key,
    name varchar(50) not null
);
--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'guest');
-- --------------------------------------------------------
create table blog_user
(
    user_id int auto_increment
        primary key,
    user_name varchar(20) not null,
    user_pwd varchar(250) default '1234' not null,
    role int not null,
    deleted int not null,
    constraint blog_user_user_login_uindex
        unique (user_name),
    constraint blog_user_roles_role_id_fk
        foreign key (role) references roles (id)
);
--
-- Dumping data for table `blog_user`
--

INSERT INTO `blog_user` (`user_id`, `user_name`, `user_pwd`, `role`, `deleted`) VALUES
(1, 'jaba', '123', 1, 0),
(25, 'Jack', '$2y$10$YvvVLzFgxn5PT0iYU1w0MepOq0M4LJCI41Ji76oCRfwof0o3/n3Ka', 2, 0),
(26, 'Tim', '123', 2, 0),
(44, 'Tom', '$2y$10$sMGYCKhluyvJwHZIuULsGOjS64tYcMZoPUMzlWpp4mqUddBrdBtUq', 2, 0),
(92, 'Nancy', '$2y$10$KQoVtTdtnm1cW.T4HTXEfuuAMo2pjKV0YcTwAizcNy6F1Ke/bMkGC', 2, 0),
(93, 'Lois', '$2y$10$NubaEzCSJqiRJd3ef.qQFeU4F0LWgJunZ4wZaPd5tIaQcGCeqjXre', 2, 0),
(94, 'Lisa', '123', 2, 0),
(95, 'Howard', '$2y$10$9BwWXxO/hyQzOYALy3l7qOAm8NHxRVJeJuPjWa1xNOU88JDhA/oD6', 2, 0),
(98, 'Superman', '$2y$10$anNYZ1Bv1wqPpsZwNsBzf.13pQBVdBoOvsudjSyJaxyddBXMfzPw.', 2, 0),
(106, 'Jens', '$2y$10$ennHhcUyHLt8jl2b05dO.u9VnsgZHMlZZx70AYTJaPpABkPjHQNKq', 2, 0);

-- --------------------------------------------------------

create table blog_post
(
    blog_id int auto_increment
        primary key,
    blog_title varchar(255) not null,
    blog_body text not null,
    blog_created_by int not null,
    created_at timestamp default current_timestamp() not null on update current_timestamp(),
    deleted int default 0 not null,
    constraint blog_post_blog_user_user_id_fk
        foreign key (blog_created_by) references blog_user (user_id)
);
--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`blog_id`, `blog_title`, `blog_body`, `blog_created_by`, `created_at`, `deleted`) VALUES
(1, '    Lorem Ipsum', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin venenatis pretium urna volutpat luctus. Suspendisse tortor mauris, pharetra suscipit vulputate et, convallis vestibulum lectus. Nulla vitae nibh neque. Nullam vel tellus et dolor fringilla faucibus sed vel sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Integer magna turpis, rutrum a lectus eu, porta lobortis velit. Nullam id pulvinar urna. Nullam congue nisl sed justo ultrices dignissim. Integer tristique in turpis vitae placerat. Suspendisse diam velit, faucibus et bibendum eget, ornare id magna. Quisque tempor tincidunt metus. Nulla vitae vestibulum arcu. Cras nec arcu elementum, porttitor elit vulputate, consectetur dui.\r\n\r\nDonec blandit justo a metus viverra ultricies. Suspendisse et justo accumsan, porttitor ipsum vitae, interdum ante. Suspendisse potenti. Proin non faucibus ante, ac mollis ipsum. Nam porta posuere elit, ac pretium eros lacinia et. Etiam sed pretium dui, nec aliquam ligula. Vivamus tristique laoreet nisi, eu luctus augue sagittis eget. Sed eget dolor nunc. Integer ac varius massa. Duis in viverra est. Quisque tincidunt et lorem vel placerat. Proin sed est sed erat volutpat luctus et id urna. Proin et enim ligula.\r\n\r\nDonec sed enim orci. Nulla facilisi. Aliquam venenatis arcu a turpis porttitor, et bibendum lorem fringilla. Suspendisse feugiat aliquet dui sed tincidunt. Fusce vehicula lobortis volutpat. Quisque consectetur volutpat tempus. Vivamus eu suscipit lacus. Suspendisse vestibulum egestas facilisis. Praesent sodales id mi nec sodales. Donec sit amet molestie massa. Maecenas at mauris mattis, elementum ipsum eget, varius orci. Nulla mattis viverra urna. In vitae ante eu lectus ornare faucibus. Praesent consectetur porta nibh.', 1, '2021-06-18 10:31:51', 0),
(2, 'Vestibulum pretium purus', ' Vestibulum pretium purus et magna ultricies, sed cursus lacus vestibulum. Curabitur quis dictum lectus, vel finibus risus. Mauris bibendum bibendum dui, vitae varius erat condimentum eget. Nam vehicula risus et imperdiet dapibus. Quisque convallis elit in purus auctor feugiat. Sed sit amet magna nec purus commodo laoreet. Maecenas eget erat vel nulla ullamcorper cursus. Nullam tincidunt vitae felis eget tincidunt. Duis semper, mi at euismod ultrices, erat lacus lacinia felis, sed pellentesque enim risus sed est. Curabitur tincidunt, ex non iaculis mollis, lacus tellus porttitor tellus, eu ultricies neque magna at lectus.\r\n\r\nNullam lacinia, dui vitae tincidunt dapibus, quam augue laoreet libero, faucibus facilisis nisi eros eu felis. Etiam malesuada in ante non tempus. Praesent fermentum consectetur auctor. Morbi a lectus vitae leo suscipit consequat. Cras nec dapibus magna, a porta magna. Suspendisse potenti. Praesent quam enim, sagittis eu consequat et, gravida sed mi. Praesent vestibulum ex mollis molestie tincidunt.\r\n\r\nNullam eu viverra metus. Etiam egestas suscipit lobortis. Sed eleifend lorem ligula, eu varius erat laoreet hendrerit. Sed viverra risus pellentesque orci dictum, a congue arcu condimentum. Nullam aliquet tincidunt pharetra. Fusce fringilla ex velit, eget pretium dui iaculis nec. Nunc dapibus luctus semper. Nulla ut hendrerit dui.\r\n\r\nNam ac leo mi. Vivamus in leo sed turpis malesuada facilisis. In ut dolor metus. Pellentesque eu metus et augue iaculis pretium. Praesent gravida, ligula vitae egestas dictum, eros dolor rutrum felis, vitae euismod risus augue id ex. Aenean sagittis fermentum metus, sed tincidunt nisl sollicitudin non. Donec non pharetra neque, in facilisis libero. Sed maximus eget augue eget interdum. Aenean vel arcu erat. Sed placerat, ligula nec accumsan dictum, diam ligula pharetra dolor, a sagittis sem purus ut turpis. Ut a ligula nec lectus aliquet fringilla. Aliquam luctus urna et felis accumsan, quis varius magna pulvinar. Aenean condimentum nisi dui, non tempor velit facilisis eget.\r\n\r\nAliquam erat volutpat. Cras nulla urna, convallis a dapibus et, molestie et leo. Morbi ornare elit a nisi egestas, eget consequat mi tincidunt. Praesent ante arcu, rutrum non dui non, efficitur luctus eros. Fusce luctus consectetur scelerisque. Proin sollicitudin hendrerit porta. Sed lobortis lacus metus, sed ornare nibh tristique ac. Nulla ullamcorper felis non mollis placerat. Nulla interdum, enim ut luctus tempor, augue libero elementum metus, ultrices vehicula ex risus non nisi. Integer placerat suscipit dolor pharetra porta. Nam ac sem tempus, tincidunt velit sed, ultrices lorem. Vivamus eget auctor felis, nec euismod quam. Pellentesque magna arcu, tempor quis viverra sed, maximus at erat. Quisque metus diam, dapibus id enim eu, suscipit dignissim enim. Sed in augue vestibulum, gravida lorem id, pulvinar enim.', 1, '2021-06-18 09:57:54', 0),
(3, 'New Entry Number 3', 'Super cool and informative awesome text', 1, '2021-06-08 14:11:51', 0),
(26, '      Super Title', '    And a Super Text. which can be extended any time or even be deleted', 1, '2021-06-18 08:12:24', 0),
(29, 'Some Awesome Titel', 'This Blog entry will blow your mind', 1, '2021-06-11 11:51:37', 0),
(104, ' New Test for Services', ' I can see it, its coming...', 25, '2021-06-18 08:54:52', 0),
(119, '98u', '89uy90', 25, '2021-06-18 11:12:28', 1);

-- --------------------------------------------------------

create table blog_comments
(
    comment_id int auto_increment
        primary key,
    blog_id int not null,
    comment_text text not null,
    created_by int default 1 not null,
    deleted int default 0 not null,
    constraint blog_comments_blog_post_blog_id_fk
        foreign key (blog_id) references blog_post (blog_id),
    constraint blog_comments_blog_user_user_id_fk
        foreign key (created_by) references blog_user (user_id)
);

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`comment_id`, `blog_id`, `comment_text`, `created_by`, `deleted`) VALUES
(76, 1, 'What an awesome Post', 25, 0),
(77, 104, 'AWEEEESOOOMMEEE!!!', 26, 0),
(78, 3, 'Cool, i like it', 106, 0),
(79, 1, 'amazing', 106, 0),
(80, 104, 'Integer a eleifend est. Nam aliquet diam quis', 98, 0),
(81, 104, 'iquet diam quis vInteger a eleifend est. Nam al', 95, 0),
(82, 104, 'Integer a st. Nam aleleifend e', 94, 0),
(83, 1, 'Integer a eleifend est. Nam aliquet diam quis', 26, 0),
(84, 1, 'quis diam iquet vInteger a eleifend est. Nam al', 44, 0),
(85, 1, ' eleifend est. Nam aliquet diam quis vInteger a', 92, 0),
(86, 1, 'iquet diam quis vInteger a eleifend est. Nam al diam quis vInteger a eleifend est. Nam al', 93, 0);

-- --------------------------------------------------------

create table user_post_rel
(
    user_id int not null,
    post_id int not null
);