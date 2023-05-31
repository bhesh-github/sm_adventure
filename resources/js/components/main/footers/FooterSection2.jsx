import React from 'react';
import { NavLink } from 'react-router-dom';
import { ImFacebook2 } from 'react-icons/im';
import { BsInstagram } from 'react-icons/bs';
import { FaTripadvisor } from 'react-icons/fa';
import { useNavigate } from 'react-router-dom';
// import {}

const FooterSection2 = () => {
	const navigate = useNavigate();
	return (
		<div className="footer-section-2">
			<h2 className="company-logo">
				Sealinks <span className="holidays">Holidays</span>
			</h2>
			<div className="section-nav">
				<NavLink to="/aboutUs" className="nav-item">
					About Us
				</NavLink>
				<NavLink to="/ourGallery" className="nav-item">
					Our Gallery
				</NavLink>
				<NavLink to="/contact" className="nav-item">
					Contact
				</NavLink>
				<NavLink to="/faq" className="nav-item">
					FAQ
				</NavLink>
				<NavLink to="/blog" className="nav-item">
					Blog
				</NavLink>
			</div>
			<div className="social-media-icons">
				<ImFacebook2 className="icons fb" />
				<BsInstagram className="icons insta" />
				<FaTripadvisor className="icons tripAdv" />
			</div>
			<div className="copyright-text">
				© Copyrights {new Date().getFullYear()} Sealinks Holidays Pvt. Ltd. |
				All Rights Reserved | Developed by Next Aussie Tech - Kathmandu
			</div>
		</div>
	);
};

export default FooterSection2;
