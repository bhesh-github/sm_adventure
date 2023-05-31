import React from "react";
import { GoPrimitiveDot } from "react-icons/go";
import { GrNext, GrPrevious } from "react-icons/gr";
import { RxCross2 } from "react-icons/rx";
import { useState, useEffect } from "react";

const GalleryWithSlider = ({ tourGallery }) => {
  // ---Overlay Switching---
  const [isSliderOverlay, setIsSliderOverlay] = useState(false);

  // ---Gallery Slider---
  const [currentIndex, setCurrentIndex] = useState(0);
  const currentData = tourGallery[currentIndex];

  const switchSlider = (toggle, imgIdx) => {
    setIsSliderOverlay(toggle);
    setCurrentIndex(imgIdx);
  };

  isSliderOverlay
    ? (document.body.style.overflowY = "hidden")
    : (document.body.style.overflowY = "scroll");

  const handleLeftClick = () => {
    const isFirstSlide = currentIndex === 0;
    const newIndex = isFirstSlide ? tourGallery.length - 1 : currentIndex - 1;
    setCurrentIndex(newIndex);
  };
  const handleRightClick = () => {
    const isLastSlide = currentIndex === tourGallery.length - 1;
    const newIndex = isLastSlide ? 0 : currentIndex + 1;
    setCurrentIndex(newIndex);
  };
  const handleSliderClose = () => {
    switchSlider(false);
  };
  return (
    <>
      <div
        className="slider-overlay"
        style={isSliderOverlay ? { display: "block" } : { display: "none" }}
      >
        <div className="gallery-slider">
          <div
            className="slider-image"
            style={{ backgroundImage: `url(${currentData})` }}
          ></div>
          <GrPrevious
            className="slider-left-icon icon"
            onClick={handleLeftClick}
          />
          <GrNext
            className="slider-right-icon icon"
            onClick={handleRightClick}
          />
          <RxCross2 className="slider-close-icon" onClick={handleSliderClose} />

          <div className="slider-dots">
            {tourGallery.slice(0, 7).map((_, imgIdx) => (
              <GoPrimitiveDot
                className="dots-icon"
                key={imgIdx}
                onClick={() => {
                  setCurrentIndex(imgIdx);
                }}
                style={currentIndex === imgIdx && { color: "grey    " }}
              />
            ))}
          </div>
        </div>
      </div>
      {tourGallery && (
        <div className="gallery-section container rounded-3 px-0">
          <div className="gallery-display-images">
            <div
              className="first-div"
              onClick={() => {
                switchSlider(true, 0);
              }}
            >
              <img src={tourGallery[0] && tourGallery[0]} className="img" />
            </div>
            <div
              className="second-div"
              onClick={() => {
                switchSlider(true, 1);
              }}
            >
              <img src={tourGallery[1] && tourGallery[1]} className="img" />
            </div>
            <div className="third-div">
              <div
                className="third-div-img-1 third-div-images"
                onClick={() => {
                  switchSlider(true, 2);
                }}
              >
                <img src={tourGallery[2] && tourGallery[2]} className="img" />
              </div>
              <div
                className="third-div-img-2 third-div-images"
                onClick={() => {
                  switchSlider(true, 3);
                }}
              >
                <img src={tourGallery[3] && tourGallery[3]} className="img" />
              </div>
            </div>
            <div className="fourth-div">
              <div className="fourth-div-first-row">
                <div
                  className="fourth-div-first-row-img"
                  onClick={() => {
                    switchSlider(true, 4);
                  }}
                >
                  <img src={tourGallery[4] && tourGallery[4]} className="img" />
                </div>
              </div>
              <div className="fourth-div-second-row">
                <div
                  className="fourth-div-second-row-first-img"
                  onClick={() => {
                    switchSlider(true, 5);
                  }}
                >
                  <img src={tourGallery[5] && tourGallery[5]} className="img" />
                </div>
                <div
                  className="fourth-div-second-row-second-img"
                  onClick={() => {
                    switchSlider(true, 6);
                  }}
                >
                  <img src={tourGallery[6] && tourGallery[6]} className="img" />
                </div>
              </div>
            </div>
          </div>
        </div>
      )}
      <div
        className="single-product-page-carousel container-fluid"
        style={{ backgroundImage: `url(${currentData})` }}
      >
        <GrPrevious
          className="slider-left-icon icon"
          onClick={handleLeftClick}
        />
        <GrNext className="slider-right-icon icon" onClick={handleRightClick} />
        <div className="slider-dots">
          {tourGallery.slice(0, 7).map((_, imgIdx) => (
            <GoPrimitiveDot
              className="dots-icon"
              key={imgIdx}
              onClick={() => {
                setCurrentIndex(imgIdx);
              }}
              style={currentIndex === imgIdx && { color: "grey    " }}
            />
          ))}
        </div>
      </div>
    </>
  );
};

export default GalleryWithSlider;

GalleryWithSlider.defaultProps = {
  tourGallery: [
    "https://images.pexels.com/photos/7625308/pexels-photo-7625308.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
    "https://images.pexels.com/photos/5118529/pexels-photo-5118529.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
    "https://images.pexels.com/photos/931007/pexels-photo-931007.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
    "https://images.pexels.com/photos/758744/pexels-photo-758744.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
    "https://images.pexels.com/photos/631317/pexels-photo-631317.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
    "https://images.pexels.com/photos/982021/pexels-photo-982021.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
    "https://images.pexels.com/photos/70442/pexels-photo-70442.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
  ],
};
