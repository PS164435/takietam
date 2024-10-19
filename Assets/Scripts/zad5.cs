using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class zad5 : MonoBehaviour {

    public GameObject cubePrefab;

    private List<Vector3> occupied = new List<Vector3>();

    Vector3 Position() {
        float x = Random.Range(-5.0f, 5.0f);
        float z = Random.Range(-5.0f, 5.0f);
        return new Vector3(x, 0.5f, z);
    }

    void Start() {

        for (int i = 0; i < 10; i++) {

            Vector3 position = Position();
            bool positionTaken = true;

            while (positionTaken) {
                positionTaken = false;
                foreach (Vector3 element in occupied) {
                    if (Mathf.Abs(position.x - element.x) < 1f && Mathf.Abs(position.z - element.z) < 1f) {
                        position = Position();
                        positionTaken = true;
                        break;
                    }
                }
            }

            Instantiate(cubePrefab, position, Quaternion.identity);
            occupied.Add(position);
        }

    }
}