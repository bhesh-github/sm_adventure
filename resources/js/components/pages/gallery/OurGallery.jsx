import React, { useState } from 'react';

import { GoPrimitiveDot } from 'react-icons/go';
import { GrNext, GrPrevious } from 'react-icons/gr';
import { RxCross2 } from 'react-icons/rx';

const OurGallery = ({ galleryImages }) => {
	// ---Overlay Switching---
	const [isSliderOverlay, setIsSliderOverlay] = useState(false);

	// ---Gallery Slider---
	const [currentIndex, setCurrentIndex] = useState(0);
	const [currentImageIdx, setCurrentImageIdx] = useState(0);

	const filteredObj = galleryImages.filter((_, idx) => idx === currentImageIdx);
	const filteredImg = filteredObj[0] ? filteredObj[0].image[currentIndex] : '';

	const switchSlider = (toggle, idx) => {
		setIsSliderOverlay(toggle);
		setCurrentIndex(0);
		setCurrentImageIdx(idx);
	};

	isSliderOverlay
		? (document.body.style.overflowY = 'hidden')
		: (document.body.style.overflowY = 'scroll');

	const handleLeftClick = () => {
		const isFirstSlide = currentIndex === 0;
		const newIndex = isFirstSlide
			? filteredObj[0].image.length - 1
			: currentIndex - 1;
		setCurrentIndex(newIndex);
	};
	const handleRightClick = () => {
		const isLastSlide = currentIndex === filteredObj[0].image.length - 1;
		const newIndex = isLastSlide ? 0 : currentIndex + 1;
		setCurrentIndex(newIndex);
	};
	// const handleSliderClose = () => {
	//   switchSlider(false);
	// };
	const bannerImage =
		'https://sealinkstravel.com/wp-content/uploads/2020/03/4-1.jpg';
	return (
		<div className="our-gallery-wrapper">
			<div
				className="banner"
				style={{ backgroundImage: `url(${bannerImage})` }}
			></div>
			{isSliderOverlay && (
				<div className="ourGallery-overlay">
					<div
						className="our-gallery-slider container"
						style={{ backgroundImage: `url(${filteredImg})` }}
					></div>
					<GrPrevious
						className="slider-left-icon icon"
						onClick={handleLeftClick}
					/>
					<GrNext
						className="slider-right-icon icon"
						onClick={handleRightClick}
					/>
					<RxCross2
						className="close-btn"
						onClick={() => {
							switchSlider(false);
						}}
					/>
					<div className="slider-dots">
						{filteredObj[0].image.map((_, imgIdx) => {
							return (
								<GoPrimitiveDot
									className="dots-icon"
									key={imgIdx}
									onClick={() => {
										setCurrentIndex(imgIdx);
									}}
									style={currentIndex === imgIdx && { color: '#F79621' }}
								/>
							);
						})}
					</div>
				</div>
			)}
			<div className="our-gallery ">
				<div className="gallery-layout container">
					{galleryImages.map((item, idx) => (
						<div className="layout-image-wrapper" key={item.id}>
							<img
								src={item.image[0]}
								alt="img"
								key={item.id}
								onClick={() => {
									switchSlider(true, idx);
								}}
								className="layout-image"
							/>
							<div className="image-title-wrapper">
								{item.title.slice(0, 38)}
							</div>
						</div>
					))}
				</div>
			</div>
		</div>
	);
};

export default OurGallery;

OurGallery.defaultProps = {
	galleryImages: [
		{
			id: 0,
			title: 'participation',
			image: [
				'https://sealinkstravel.com/wp-content/uploads/2020/03/6.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/2.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/3.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/4.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/5.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/1.jpg',
			],
		},
		{
			id: 1,
			title: 'CRS',
			image: [
				'https://sealinkstravel.com/wp-content/uploads/2020/03/1-2.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/2-2.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/3-2.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/4-2.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/5-2.jpg',
			],
		},
		{
			id: 2,
			title: 'Domestic And International TourPackage',
			image: [
				'https://sealinkstravel.com/wp-content/uploads/2020/03/4-1.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/5-1.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/6-1.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/1-1.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/2-1.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/3-1.jpg',
			],
		},
		{
			id: 3,
			title: 'Awards And Recognition',
			image: [
				'https://sealinkstravel.com/wp-content/uploads/2020/03/2-3.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/3-3.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/4-3.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/5-3.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/6-2.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/7.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/8.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/9.jpg',
				'https://sealinkstravel.com/wp-content/uploads/2020/03/1-3.jpg',
			],
		},
	],
};
