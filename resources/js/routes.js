const IndexUser = () => import('./components/users/Index.vue');
const CreateUser = () => import('./components/users/Create.vue');
const EditUser = () => import('./components/users/Edit.vue');
const ShowUser = () => import('./components/users/Show.vue');

export const routes = [
	{
		path: '/',
		component: IndexUser,
	},
	{
		name: 'users',
		path: '/users',
		component: IndexUser,
	},
	{
		name: 'create',
		path: '/users/create',
		component: CreateUser,
	},
	{
		name: 'edit',
		path: '/users/edit/:id',
		component: EditUser,
	},
	{
		name: 'show',
		path: '/users/show/:id',
		component: ShowUser,
	},
];