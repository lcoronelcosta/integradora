import React, { useState } from 'react';
import { Collapse, Navbar, NavbarToggler, NavbarBrand, Nav, NavItem, NavLink } from 'reactstrap';

const Example = (props) => {
  const [collapsed, setCollapsed] = useState(true);

  const toggleNavbar = () => setCollapsed(!collapsed);

  return (
    <div>
      <Navbar color="light" light expand="xl">
        <NavbarBrand href="/" className="mr-auto">Mi Pedido - Categorias</NavbarBrand>
        <NavbarToggler onClick={toggleNavbar} className="mr-2" />
        <Collapse isOpen={!collapsed} navbar>
          <Nav navbar>
            <NavItem>
              <Nav navbar>
                <NavItem>
                  <NavLink href="GetSubcategorias.js">Cerrajeria</NavLink>
                </NavItem>
              </Nav>
              
            </NavItem>
            <NavItem>
              <NavLink href="https://github.com/reactstrap/reactstrap">Electricidad</NavLink>
            </NavItem>
          </Nav>
        </Collapse>
      </Navbar>
    </div>
  );
}



export default Example;