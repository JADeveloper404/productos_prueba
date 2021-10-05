// Importamos los componentes para asignarles una ruta
const Home = () => import('./components/Home.vue')
const Crear = () => import('./components/producto/Crear.vue')
const Editar = () => import('./components/producto/Editar.vue')
const Mostrar = () => import('./components/producto/Mostrar.vue')

// Creamos la constante que vamos a exportar para configurar las rutas

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'mostrarProductos',
        path: '/productos',
        component: Mostrar
    },
    {
        name: 'crearProducto',
        path: '/crear',
        component: Crear
    },
    {
        name: 'editarProducto',
        path: '/editar/:id',
        component: Editar
    }
]
