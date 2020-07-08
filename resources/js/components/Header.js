import React from 'react'
import { Link } from 'react-router-dom'

const Header = () => (
    <nav className='navbar navbar-expand-md navbar-light bg-white shadow-sm'>
        <div className='container'>
            <Link className='navbar-brand' to='/'>APAL Gestión</Link>
            <button className='navbar-toggler' type='button' data-toggle='collapse'
                    data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent'
                    aria-expanded='false' aria-label='Toggle navigation'>
                <span className='navbar-toggler-icon'></span>
            </button>

            <div className='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul className='navbar-nav mr-auto'>
                    <li className='nav-item dropdown'>
                        <Link id='navbarDropdown' className='nav-link dropdown-toggle' to='#' role='button'
                              data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                  Instituciones <span className='caret'></span>
                        </Link>
                        <div className='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdown'>
                            <Link className='dropdown-item' to='/instituciones'>Lista de Instituciones</Link>
                            <Link className='dropdown-item' to='/institucion/nueva'>Nueva Institución</Link>
                        </div>

                    </li>
                </ul>
                <ul className='navbar-nav ml-auto'>
                    <li className='nav-item'>
                        <Link className='nav-link' to='/login'>Iniciar sesión</Link>
                    </li>
                    <li className='nav-item'>
                        <Link className='nav-link' to='/register'>Registrarme</Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
)

export default Header
