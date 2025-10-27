INSERT INTO `tbl_permisos` (`txtnombre`, `txtdescripcion`, `txtclave`, `created_at`, `updated_at`, `iidmodulo`) VALUES
('verusuario', 'ver usuarios', 'VUSER', NOW(), NOW(), 1),
('editarusuario', 'editar todo de los usuarios', 'EDUSER', NOW(), NOW(), 1),
('crearusuario', 'crear o registrar un nuevo usuario', 'CREUSER', NOW(), NOW(), 1),
('eliminarusuario', 'desactivar a un usuario que esta vigente', 'ELIUSER', NOW(), NOW(), 1),

('verproducto', 'ver productos', 'VPROD', NOW(), NOW(),2),
('editarproducto', 'editar información de productos', 'EDPROD', NOW(), NOW(),2),
('crearproducto', 'crear o registrar un nuevo producto', 'CREPROD', NOW(), NOW(),2),
('eliminarproducto', 'eliminar o desactivar un producto', 'ELIPROD', NOW(), NOW(),2),

('verconfiguracion', 'ver configuraciones del sistema', 'VCONF', NOW(), NOW(), 3),
('editarconfiguracion', 'editar configuraciones del sistema', 'EDCONF', NOW(), NOW(),3),
('crearconfiguracion', 'crear nuevas configuraciones', 'CRECONF', NOW(), NOW(),3),
('eliminarconfiguracion', 'eliminar configuraciones del sistema', 'ELICONF', NOW(), NOW(),3),

('vercatalogo', 'ver catálogo de productos', 'VCAT', NOW(), NOW(),4),
('editarcatalogo', 'editar elementos del catálogo', 'EDCAT', NOW(), NOW(),4),
('crearcatalogo', 'crear nuevos elementos en el catálogo', 'CRECAT', NOW(), NOW(),4),
('eliminarcatalogo', 'eliminar elementos del catálogo', 'ELICAT', NOW(), NOW(),4);

