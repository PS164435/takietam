// spawner plyt
using System.Collections.Generic;
using UnityEngine;

public class PlateSpawner : MonoBehaviour
{
    public GameObject plate;
    public Transform spawnPoint;
    public Vector3 endPosition = new Vector3(0f, 0f, 0f);
    public float speed = 2f;

    private bool needAnother = true;
    private HashSet<Collider> platesInRange = new HashSet<Collider>();
    private GameObject currentPlate;

    private void OnTriggerEnter(Collider other)
    {
        if (other.CompareTag("Plate"))
        {
            platesInRange.Add(other);
        }
    }

    private void OnTriggerExit(Collider other)
    {
        if (other.CompareTag("Plate"))
        {
            platesInRange.Remove(other);
            if (platesInRange.Count == 0)
            {
                needAnother = true;
            }
        }
    }

    private void Update()
    {
        if (platesInRange.Count == 0 && currentPlate == null && needAnother == true)
        {
            needAnother = false;
            currentPlate = Instantiate(plate, spawnPoint.position, Quaternion.identity);
            currentPlate.name = "Plate";
        }

        if (currentPlate != null)
        {
            if (Vector3.Distance(currentPlate.transform.position, endPosition) > 0.01f)
            {
                currentPlate.transform.position = Vector3.MoveTowards(currentPlate.transform.position, endPosition, speed * Time.deltaTime);
            }
            else
            {
                currentPlate.transform.position = endPosition;
                ActivateCollider(currentPlate);
                currentPlate = null;
            }
        }
    }

    private void ActivateCollider(GameObject plate)
    {
        BoxCollider boxCollider = plate.GetComponent<BoxCollider>();
        boxCollider.enabled = true;
    }
}
