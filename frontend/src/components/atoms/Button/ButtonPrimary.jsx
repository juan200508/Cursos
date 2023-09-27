// Import the primereact button set
import {Button} from "primereact/button"

export const ButtonPrimary = (props) => {
  return (
    <Button label={props.label} severity={props.severity} className="py-2"/>
  )
}
