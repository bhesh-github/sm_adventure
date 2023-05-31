import React from "react";

const OutboundPlacesCard = ({ tour }) => {
  const { imgUrl, placeName } = tour;
  return (
     <div className="top-outbound-tour-card" >
      <img className="top-outbound-tour-card-img" src={imgUrl} alt="outbound-img" />
      <p className="top-outbound-tour-card-place-name">{placeName}</p>
    </div>
  );
};
export default OutboundPlacesCard;

OutboundPlacesCard.defaultProps = {
  outboundTours: {
    id: 0,
    imgUrl:
      "https://images.pexels.com/photos/2659475/pexels-photo-2659475.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2",
    placeName: "Indonesia",
  },
};
