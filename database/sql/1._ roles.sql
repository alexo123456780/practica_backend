INSERT INTO `tbl_roles` (`txtnombre`, `txtdescripcion`, `created_at`, `updated_at`) VALUES 
('administrador', 'administra todo y tiene control total de toda la pagina web', NOW(), NOW()),
('vendedor', 'tiene acceso al modulo de ventas y el control de las ventas tambien', NOW(), NOW()),
('editor', 'Tiene solo acceso a configuraciones del sistema nada mas', NOW(), NOW()),
('usuario', 'tiene acceso unicamente a ver que productos hay disponibles', NOW(), NOW());
