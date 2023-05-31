import React from 'react';
import { NavLink, Link } from 'react-router-dom';
import { useNavigate } from 'react-router-dom';
import { GiHamburgerMenu } from 'react-icons/gi';

// import Slider from "./images/sealinks_logo.png";
const Navbar = ({ setSidebarClass }) => {
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
					<li>
						<div
							className="nav-link inbound"
							onClick={() => {
								navigate('./inboundPackages');
							}}
						>
							<div className="dropdown">
								<button className="dropbtn">Inbound Packages</button>
								<div className="dropdown-content">
									<NavLink to="/inboundPackages">Top Tour Packages</NavLink>
									<NavLink to="/inboundPackages">Top Trekking Packages</NavLink>
									<NavLink to="/inboundPackages">Mountaineering</NavLink>
									<NavLink to="/inboundPackages">Expedition</NavLink>
									<NavLink to="/inboundPackages">Adventure Activities</NavLink>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div
							className="nav-link outbound"
							onClick={() => {
								navigate('./outboundPackages');
							}}
						>
							<div className="dropdown">
								<button className="dropbtn">Outbound Packages</button>
								<div className="dropdown-content">
									<NavLink to="/outboundPackages">Dubai</NavLink>
									<NavLink to="/outboundPackages">Thailand</NavLink>
									<NavLink to="/outboundPackages">China</NavLink>
									<NavLink to="/outboundPackages">Indonesia</NavLink>
									<NavLink to="/outboundPackages">Colours of Europe</NavLink>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div className="nav-link outbound">
							<div className="dropdown">
								<button className="dropbtn">Travel Info</button>
								<div className="dropdown-content">
									<NavLink to="/generalInformation">
										General Information
									</NavLink>
									<NavLink to="/bookingInformation">Booking Condition</NavLink>
									<NavLink to="/visaInformation">Visa Information</NavLink>
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
						setSidebarClass('block');
					}}
				/>
			</nav>
		</>
	);
};

export default Navbar;
