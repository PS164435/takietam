// obsluga kolidera od podanodzenia rak, przelaczanie komponentow i przesuwanie drzwi i piedestalow
using UnityEngine;
using UnityEngine.XR.Interaction.Toolkit;
using System.Collections.Generic;

public class ToggleComponentsForHands : MonoBehaviour
{
    public GameObject Pedestals;
    public GameObject Table;
    public GameObject Doors;
    private Vector3 PedestalsEndPosition = new Vector3(-0.1199989f, 2f, 35.75f);
    private Vector3 TableEndPosition = new Vector3(-0.1199989f, 0f, 35.75f);
    private Vector3 DoorsEndPosition = new Vector3(-0.1000977f, 6.65f, 36.56f);
    public float speed;
    public float speed2;
    private bool NextPart;
    public GameObject Lock1;
    public GameObject Lock2;
    public GameObject Lock3;  
    private Vector3 Lock1EndPosition = new Vector3(-5.047588f, 3.01888f, 35.73999f);
    private Vector3 Lock2EndPosition = new Vector3(-0.1000977f, 3.01888f, 40.0668f);
    private Vector3 Lock3EndPosition = new Vector3(4.847413f, 3.01888f, 35.74001f);
    public GameObject leftLine;
    public GameObject rightLine;
    public GameObject InfoENG;
    public GameObject InfoPL;
    
    [System.Serializable]
    public class ObjectComponentConfig
    {
        public GameObject targetObject;
        public string[] componentsToEnable;
        public string[] componentsToDisable;
    }

    public List<ObjectComponentConfig> objectConfigs;

    private XRGrabInteractable grabInteractable;

    private void Update()
        {
            if (!NextPart) return;

            Pedestals.transform.position = Vector3.MoveTowards(Pedestals.transform.position, PedestalsEndPosition, speed * Time.deltaTime);
            Table.transform.position = Vector3.MoveTowards(Table.transform.position, TableEndPosition, speed * Time.deltaTime);
            Doors.transform.position = Vector3.MoveTowards(Doors.transform.position, DoorsEndPosition, speed * Time.deltaTime);
            Lock1.transform.position = Vector3.MoveTowards(Lock1.transform.position, Lock1EndPosition, speed2* Time.deltaTime);
            Lock2.transform.position = Vector3.MoveTowards(Lock2.transform.position, Lock2EndPosition, speed2 * Time.deltaTime);
            Lock3.transform.position = Vector3.MoveTowards(Lock3.transform.position, Lock3EndPosition, speed2 * Time.deltaTime);
            
            if (Pedestals.transform.position == PedestalsEndPosition && Table.transform.position == TableEndPosition && Doors.transform.position == DoorsEndPosition)
            {
                NextPart = false;
            }
        }

    private void Awake()
    {
        grabInteractable = GetComponent<XRGrabInteractable>();
        grabInteractable.selectEntered.AddListener(OnGrabbed);
    }

    private void OnDestroy()
    {
        grabInteractable.selectEntered.RemoveListener(OnGrabbed);
    }

    private void OnGrabbed(SelectEnterEventArgs args)
    {
        foreach (var config in objectConfigs)
        {
            foreach (string componentName in config.componentsToEnable)
            {
                SetComponentState(config.targetObject, componentName, true);
            }
            foreach (string componentName in config.componentsToDisable)
            {
                SetComponentState(config.targetObject, componentName, false);
            }
        }
        NextPart = true;
        
        leftLine.SetActive(true);
        rightLine.SetActive(true);
        InfoPL.SetActive(true);
        InfoENG.SetActive(true);

    }

    private void SetComponentState(GameObject obj, string componentName, bool state)
    {
        Component component = obj.GetComponent(componentName);
        if (component is Behaviour behaviour)
        {
            behaviour.enabled = state;
        }
        else if (component is Collider collider)
        {
            collider.enabled = state;
        }
        else if (component is Renderer renderer)
        {
            renderer.enabled = state;
        }
    }
}
