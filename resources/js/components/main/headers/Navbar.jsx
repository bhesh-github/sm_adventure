import React, { useEffect, useState } from "react";
import { NavLink, Link } from "react-router-dom";
import { useNavigate } from "react-router-dom";
import { GiHamburgerMenu } from "react-icons/gi";
import axios from "axios";

const Navbar = ({ setSidebarClass }) => {
    const [navCategory, setNavCategory] = useState([]);
    const [navMenus, setNavMenus] = useState();

    const fetchFunc = async () => {
        const catRes = await fetch("http://localhost:8000/api/category");
        const catData = await catRes.json();
        setNavCategory(catData);
        // -------------------------------------------
        const menuRes = await axios.get("http://127.0.0.1:8000/api/menus");
        const menuData = await menuRes.data;
        setNavMenus(menuData[0]);
    };
    useEffect(() => {
        fetchFunc();
    }, []);
    const navigate = useNavigate();
    return (
        <>
            <nav className="header-navbar">
                <NavLink to="/" className="main-logo">
                    <img
                        // src="./images/sealinks_logo.png"
                        src="https://sealinkstravel.com/wp-content/uploads/2020/02/sealinks1.png"
                        alt="sealinks_logo"
                        className="main-logo-img"
                    />
                </NavLink>
                <ul className="navigation-menu">
                    <li>
                        <NavLink to="/" className="nav-link gallery">
                            Home
                        </NavLink>
                    </li>
                    {navCategory?.map((cat, idx) => {
                        return (
                            <li key={idx}>
                                <div
                                    className="nav-link inbound"
                                    onClick={() => {
                                        navigate("./inboundPackages");
                                    }}
                                >
                                    <div className="dropdown">
                                        <button className="dropbtn">
                                            {cat?.name}
                                        </button>
                                        {cat?.subcategories?.length > 0 && (
                                            <div className="dropdown-content">
                                                {cat?.subcategories?.map(
                                                    (sub, idx) => {
                                                        return (
                                                            <NavLink
                                                                to="/inboundPackages"
                                                                key={idx}
                                                            >
                                                                {sub?.name}
                                                            </NavLink>
                                                        );
                                                    }
                                                )}
                                            </div>
                                        )}
                                    </div>
                                </div>
                            </li>
                        );
                    })}
                    <li>
                        <div className="nav-link outbound">
                            <div className="dropdown">
                                <button className="dropbtn">
                                    {navMenus && navMenus.name}
                                </button>
                                <div className="dropdown-content">
                                    {navMenus &&
                                        navMenus.sub_menus.map((item) => (
                                            <NavLink
                                                to={`/travelInfo/${item.id}`}
                                                key={item.id}
                                            >
                                                {item.name}
                                            </NavLink>
                                        ))}
                                    {/* <NavLink to="/generalInformation">
                                        General Information
                                    </NavLink>
                                    <NavLink to="/bookingInformation">
                                        Booking Condition
                                    </NavLink>
                                    <NavLink to="/visaInformation">
                                        Visa Information
                                    </NavLink> */}
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <NavLink to="/ourGallery" className="nav-link gallery">
                            Our Gallery
                        </NavLink>
                    </li>
                    <li>
                        <NavLink to="/aboutUs" className="nav-link outbound">
                            About Us
                        </NavLink>
                    </li>
                    <li>
                        <NavLink to="/faq" className="nav-link outbound">
                            FAQ
                        </NavLink>
                    </li>
                    <li>
                        <NavLink to="/blog" className="nav-link outbound">
                            Blog
                        </NavLink>
                    </li>
                    <li>
                        <NavLink to="/contact" className="nav-link outbound">
                            Contact
                        </NavLink>
                    </li>
                </ul>
                <GiHamburgerMenu
                    className="hamburger-menu-icon"
                    onClick={() => {
                        setSidebarClass("block");
                    }}
                />
            </nav>
        </>
    );
};

export default Navbar;
