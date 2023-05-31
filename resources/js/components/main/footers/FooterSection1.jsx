import React from "react";
import { NavLink } from "react-router-dom";

const FooterSection1 = ({ footerList }) => {
  const listColumn = footerList.map((item, idx) => {
    return item.title !== "Contact" ? (
      <div className="list-column" key={item.id}>
        <ul>
          <li className=" list-title list">{item.title}</li>
          <li className="list">
            <NavLink className="list">{item.list[0]}</NavLink>
          </li>
          <li className="list">
            <NavLink className="list">{item.list[1]}</NavLink>
          </li>
          <li className="list">
            <NavLink className="list">{item.list[2]}</NavLink>
          </li>
          <li className="list">
            <NavLink className="list">{item.list[3]}</NavLink>
          </li>
        </ul>
      </div>
    ) : (
      <div className="list-column" key={item.id}>
        <ul>
          <div className="contact-list-title ">{item.title}</div>
          <div className="contact-list">{item.list.tel}</div>
          <div className="contact-list">{item.list.address}</div>
          <div className="contact-list">
            {
              <img
                className="contact-list-payment-img"
                src={item.list.imgUrl}
                alt="payment-img"
              />
            }
          </div>
        </ul>
      </div>
    );
  });

  return (
    <div className="footer-section-1">
      <div className="footer-section-1-list-columns">{listColumn}</div>
    </div>
  );
};

export default FooterSection1;

FooterSection1.defaultProps = {
  footerList: [
    {
      id: 0,
      title: "Top Tour",
      list: [
        "Capital Highlights Tour",
        "Kathmandu Mountain Tour",
        "Muktinath Darshan Tour",
        "NEPAL COMBO HIGHLIGHTS",
        "Sirubari Village Tour",
      ],
    },
    {
      id: 0,
      title: "Top Tour",
      list: [
        "Capital Highlights Tour",
        "Kathmandu Mountain Tour",
        "Muktinath Darshan Tour",
        "NEPAL COMBO HIGHLIGHTS",
        "Sirubari Village Tour",
      ],
    },
    {
      id: 0,
      title: "Top Tour",
      list: [
        "Capital Highlights Tour",
        "Kathmandu Mountain Tour",
        "Muktinath Darshan Tour",
        "NEPAL COMBO HIGHLIGHTS",
        "Sirubari Village Tour",
      ],
    },
    {
      id: 3,
      title: "Contact",
      list: {
        tel: "01-4427892 /4424953",
        address: "Nag Pokhari, Kathmandu, Nepal",
        imgUrl:
          "https://sealinkstravel.com/wp-content/uploads/2020/03/we-accept.png",
      },
    },
  ],
};
