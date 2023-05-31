import Navbar from './Navbar';
import { GrFacebook } from 'react-icons/gr';
import { BsInstagram } from 'react-icons/bs';
import { SiTripadvisor } from 'react-icons/si';
import { AiOutlineCloseCircle } from 'react-icons/ai';
import { NavLink } from 'react-router-dom';
import { useState } from 'react';
import { AiOutlineCaretDown, AiOutlineCaretRight } from 'react-icons/ai';

const sidebarContentObj = {
	inboundContent: false,
	inboundCaretLeft: 'none',
	inboundCaretDown: '',
	inboundDisplayContent: 'inbound-display-content',
	outboundContent: false,
	outboundCaretLeft: 'none',
	outboundCaretDown: '',
	outboundDisplayContent: 'outbound-display-content',
};

const Header = () => {
	const [sidebarClass, setSidebarClass] = useState('none');
	const [toggleSidebarContent, setToggleSidebarContent] =
		useState(sidebarContentObj);
	const toggleContent = (bound) => {
		bound === 'inbound'
			? toggleSidebarContent.inboundCaretLeft === 'none'
				? setToggleSidebarContent((prev) => ({
						...prev,
						inboundContent: true,
						inboundCaretLeft: '',
						inboundCaretDown: 'none',
						inboundDisplayContent: '',
				  }))
				: toggleSidebarContent.inboundCaretLeft === '' &&
				  setToggleSidebarContent((prev) => ({
						...prev,
						inboundCaretLeft: 'none',
						inboundCaretDown: '',
						inboundDisplayContent: 'inbound-display-content',
				  }))
			: toggleSidebarContent.outboundCaretLeft === 'none'
			? setToggleSidebarContent((prev) => ({
					...prev,
					outboundCaretLeft: '',
					outboundCaretDown: 'none',
					outboundDisplayContent: '',
			  }))
			: setToggleSidebarContent((prev) => ({
					...prev,
					outboundCaretLeft: 'none',
					outboundCaretDown: '',
					outboundDisplayContent: 'outbound-display-content',
			  }));
	};
	sidebarClass === 'block'
		? (document.body.style.overflowY = 'hidden')
		: (document.body.style.overflowY = 'scroll');
	return (
		<>
			<div className="navbar-wrapper">
				<div className="header-top-nav">
					<div className="header-contacts-info-social-icons-wrapper">
						<div className="contacts-info-wrapper">
							<span className="contact-info email ">info@sealinks.com.np</span>
							<span className="contact-info number">+977 9801093735</span>
							<span className="contact-info address">
								Nag Pokhari, Kathmandu, Nepal
							</span>
						</div>
						<div className="social-icons-wrapper">
							<GrFacebook className="social-icon" />
							<BsInstagram className="social-icon" />
							<SiTripadvisor className="social-icon" />
						</div>
					</div>
				</div>
				<div className="header-nav-wrapper">
					<Navbar setSidebarClass={setSidebarClass} />
				</div>
			</div>
			{sidebarClass === 'block' && <div className="sidebar-overlay"></div>}
			<div className="side-bar" style={{ display: `${sidebarClass}` }}>
				<AiOutlineCloseCircle
					className="close-icon"
					onClick={() => {
						setSidebarClass('none');
					}}
				/>
				<div className="side-bar-item-list">
					<NavLink
						to="./"
						className="side-bar-item"
						onClick={() => {
							setSidebarClass('none');
						}}
					>
						Home
					</NavLink>
					<div className="side-bar-item inbound-packages">
						<label htmlFor="inbound-packages" className="inbound-packages">
							<NavLink
								to="./inboundPackages"
								className="side-bar-item inbound-packages"
								onClick={() => {
									setSidebarClass('none');
								}}
							>
								Inbound Packages
							</NavLink>
							<span
								className="caret-icons "
								onClick={() => {
									toggleContent('inbound');
								}}
							>
								<AiOutlineCaretDown
									className="caret-down"
									style={{
										display: `${toggleSidebarContent.inboundCaretLeft}`,
									}}
								/>
								<AiOutlineCaretRight
									className="caret-right"
									style={{
										display: `${toggleSidebarContent.inboundCaretDown}`,
									}}
								/>
							</span>
						</label>
						<label className="content-label">
							<div
								className={`content ${toggleSidebarContent.inboundDisplayContent}`}
								id="inbound-packages"
							>
								<div className="content-list">
									<NavLink
										to="./inboundPackages"
										className="navlink"
										onClick={() => {
											setSidebarClass('none');
										}}
									>
										Top Tour Packages
									</NavLink>
								</div>
								<div className="content-list">
									<NavLink
										to="./inboundPackages"
										className="navlink"
										onClick={() => {
											setSidebarClass('none');
										}}
									>
										Top Trekking Packages
									</NavLink>
								</div>
								<div className="content-list">
									<NavLink
										to="./inboundPackages"
										className="navlink"
										onClick={() => {
											setSidebarClass('none');
										}}
									>
										Mountaineering
									</NavLink>
								</div>
								<div className="content-list">
									<NavLink
										to="./inboundPackages"
										className="navlink"
										onClick={() => {
											setSidebarClass('none');
										}}
									>
										Expedition
									</NavLink>
								</div>
								<div className="content-list">
									<NavLink
										to="./inboundPackages"
										className="navlink"
										onClick={() => {
											setSidebarClass('none');
										}}
									>
										Adventure Activities
									</NavLink>
								</div>
							</div>
						</label>
					</div>
					<div className="side-bar-item outbound-packages">
						<label htmlFor="outbound-packages" className=" outbound-packages">
							<NavLink
								to="./outboundPackages"
								className="side-bar-item  outbound-packages"
								onClick={() => {
									setSidebarClass('none');
								}}
							>
								Outbound Packages
							</NavLink>
							<span
								className="caret-icons "
								onClick={() => {
									toggleContent('outbound');
								}}
							>
								<AiOutlineCaretDown
									className="caret-down"
									style={{
										display: `${toggleSidebarContent.outboundCaretLeft}`,
									}}
								/>
								<AiOutlineCaretRight
									className="caret-right"
									style={{
										display: `${toggleSidebarContent.outboundCaretDown}`,
									}}
								/>
							</span>
						</label>
						<label className="content-label">
							<div
								className={`content ${toggleSidebarContent.outboundDisplayContent}`}
								id=" outbound-packages"
							>
								<div className="content-list">
									<NavLink
										to="./outboundPackages"
										className="navlink"
										onClick={() => {
											setSidebarClass('none');
										}}
									>
										Dubai
									</NavLink>
								</div>
								<div className="content-list">
									<NavLink
										to="./outboundPackages"
										className="navlink"
										onClick={() => {
											setSidebarClass('none');
										}}
									>
										Thailand
									</NavLink>
								</div>
								<div className="content-list">
									<NavLink
										to="./outboundPackages"
										className="navlink"
										onClick={() => {
											setSidebarClass('none');
										}}
									>
										China
									</NavLink>
								</div>
								<div className="content-list">
									<NavLink
										to="./outboundPackages"
										className="navlink"
										onClick={() => {
											setSidebarClass('none');
										}}
									>
										Indonesia
									</NavLink>
								</div>
								<div className="content-list">
									<NavLink
										to="./outboundPackages"
										className="navlink"
										onClick={() => {
											setSidebarClass('none');
										}}
									>
										Colours of Europe
									</NavLink>
								</div>
							</div>
						</label>
					</div>
					<NavLink
						to="./ourGallery"
						className="side-bar-item"
						onClick={() => {
							setSidebarClass('none');
						}}
					>
						Our Gallery
					</NavLink>
					<NavLink
						to="./aboutUs"
						className="side-bar-item"
						onClick={() => {
							setSidebarClass('none');
						}}
					>
						About Us
					</NavLink>
					<NavLink
						to="./faq"
						className="side-bar-item"
						onClick={() => {
							setSidebarClass('none');
						}}
					>
						FAQ
					</NavLink>
					<NavLink
						to="./blog"
						className="side-bar-item"
						onClick={() => {
							setSidebarClass('none');
						}}
					>
						Blog
					</NavLink>
					<NavLink
						to="./contact"
						className="side-bar-item"
						onClick={() => {
							setSidebarClass('none');
						}}
					>
						Contact
					</NavLink>
					<NavLink
						to="./singleProductPage"
						className="side-bar-item"
						onClick={() => {
							setSidebarClass('none');
						}}
					>
						Single Product Page
					</NavLink>
					<NavLink
						to="./singleBlogPage"
						className="side-bar-item"
						onClick={() => {
							setSidebarClass('none');
						}}
					>
						Single Blog Page
					</NavLink>
				</div>
			</div>
		</>
	);
};

export default Header;
